package com.abhinav.news2;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import android.app.Activity;
import android.app.ProgressDialog;
import android.net.http.AndroidHttpClient;
import android.os.AsyncTask;
import android.os.Bundle;
import android.text.method.ScrollingMovementMethod;
import android.util.Log;
import android.view.Menu;
import android.widget.TextView;


public class Content extends Activity {
	private ProgressDialog mProgressDialog;
	TextView tv1;
	TextView tv2;
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_content);
		tv1 = (TextView)findViewById(R.id.tv1);
		tv2 = (TextView)findViewById(R.id.tv2);
		
		mProgressDialog = new ProgressDialog(this);
		   mProgressDialog.setIndeterminate(false);
		   mProgressDialog.setProgressStyle(ProgressDialog.STYLE_SPINNER);
		
		tv1.setText(getIntent().getStringExtra("headingVal"));
		new HttpGetTask().execute();
		overridePendingTransition(R.anim.anim2, R.anim.anim1);
	}

	
	private class HttpGetTask extends AsyncTask<Void, Void, String> {

		// Get your own user name at http://www.geonames.org/login
		private  String URL = "http://192.168.1.209/ui/script.php?link=";

		AndroidHttpClient mClient = AndroidHttpClient.newInstance("");
		 @Override
         protected void onPreExecute()
		 {
             super.onPreExecute();
             URL+=getIntent().getStringExtra("linkVal");
             mProgressDialog.setMessage("Loading");
             mProgressDialog.show();
 			 Log.i("dasdasda","URL is "+URL);
         }
		@Override
		protected String doInBackground(Void... params)
		{
			JSONParser jParser=new JSONParser();
			JSONArray json=jParser.getJSONFromUrl(URL);
	        String data="";
			for (int i = 0; i < json.length(); i++) 
			{ 
				try 
				{ 
					JSONObject c = json.getJSONObject(i);
				     data=c.getString("content");
	//				linkList.add(link);
					
				}
				catch(JSONException e)
				{
					
					e.printStackTrace();
				}
			}

			return data;
		}

		@Override
		protected void onPostExecute(String result) {
			if (null != mClient)
				mClient.close();
			if (mProgressDialog.isShowing()) {
	            mProgressDialog.dismiss();
	        }
			
			Log.i("MyExperiment","Result is "+result);
			tv2.setText(result);
			tv2.setMovementMethod(ScrollingMovementMethod.getInstance());
			/*lv.setAdapter(new ArrayAdapter<String>(
					ListViewHeading.this,
					R.layout.activity_heading, result));*/
		}
	}
	
	
	@Override
	public boolean onCreateOptionsMenu(Menu menu) {
		// Inflate the menu; this adds items to the action bar if it is present.
		getMenuInflater().inflate(R.menu.content, menu);
		return true;
	}

}
