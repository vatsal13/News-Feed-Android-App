package com.abhinav.news2;

import java.util.LinkedList;
import java.util.List;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import android.app.ListActivity;
import android.app.ProgressDialog;
import android.content.Intent;
import android.net.http.AndroidHttpClient;
import android.os.AsyncTask;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.AdapterView;
import android.widget.AdapterView.OnItemClickListener;
import android.widget.ArrayAdapter;
import android.widget.ListView;
import android.widget.Toast;

public class ListViewHeading extends ListActivity 
{
	private ProgressDialog mProgressDialog;
	ArrayAdapter<String> mAdapter;
	ListView lv;
	List<String> linkList;
	@Override
	public void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		linkList=new LinkedList<String>();
		
		 mProgressDialog = new ProgressDialog(this);
		   mProgressDialog.setIndeterminate(false);
		   mProgressDialog.setProgressStyle(ProgressDialog.STYLE_SPINNER);
		
		// Create a new Adapter containing a list of colors
		// Set the adapter on this ListActivity's built-in ListView
		setListAdapter(new ArrayAdapter<String>(this, R.layout.activity_heading,
				getResources().getStringArray(R.array.colors)));
		
		

		lv = getListView();

		
		// Enable filtering when the user types in the virtual keyboard
		lv.setTextFilterEnabled(true);

		// Set an setOnItemClickListener on the ListView
		lv.setOnItemClickListener(new OnItemClickListener() {
			public void onItemClick(AdapterView<?> parent, View view,
					int position, long id) {
				String link=linkList.get(position);
				
				String heading =(String) (lv.getItemAtPosition(position));
				Intent intent = new Intent(getApplication(), Content.class);
				intent.putExtra("headingVal",heading);
				intent.putExtra("li" +
						"nkVal",link);
				
				startActivity(intent);
				overridePendingTransition(R.anim.anim1, R.anim.anim2);
				
				   
		// Display a Toast message indicting the selected item
				
			}
		});
		new HttpGetTask().execute();
		
		
		overridePendingTransition(R.anim.anim2, R.anim.anim1);	
	}
	private class HttpGetTask extends AsyncTask<Void, Void, List<String>> {

		// Get your own user name at http://www.geonames.org/login
		private  String URL = "http://192.168.1.209/ui/script.php?id=";
		
		
		ArrayAdapter<String> mAdap;
		AndroidHttpClient mClient = AndroidHttpClient.newInstance("");
		 @Override
         protected void onPreExecute()
		 {
             super.onPreExecute();
             mProgressDialog.setMessage("Loading");
             mProgressDialog.show();
             URL+=getIntent().getIntExtra("id",2);
 			 Log.i("dasdasda","URL is "+URL);
         }
		@Override
		protected List<String> doInBackground(Void... params)
		{
			JSONParser jParser=new JSONParser();
			JSONArray json=jParser.getJSONFromUrl(URL);
	        List<String> l=new LinkedList<String>();
			for (int i = 0; i < json.length(); i++) 
			{ 
				try 
				{ 
					JSONObject c = json.getJSONObject(i);
					String link=c.getString("link");
					linkList.add(link);
					String heading=link.substring(0,link.lastIndexOf("/"));
					if(getIntent().getIntExtra("id",1)==1)
					{
						heading=heading.substring(0,heading.lastIndexOf("/"));
						
					}
					  heading=heading.substring(heading.lastIndexOf("/")+1);
					  
					
					heading = heading.replace('-', ' ');
					heading = heading.substring(0,1).toUpperCase() + heading.substring(1);
					//String output = input.substring(0, 1).toUpperCase() + input.substring(1);
					
					Log.i("daasd","heading "+heading);
					l.add(heading);
					Log.i("dasdas","link is "+link);
				}
				catch(JSONException e)
				{
					
					e.printStackTrace();
				}
			}

			return l;
		}

		@Override
		protected void onPostExecute(List<String> result) {
			if (null != mClient)
				mClient.close();
			if (mProgressDialog.isShowing()) {
	            mProgressDialog.dismiss();
	        }
			mAdap = new ArrayAdapter<String>(
					ListViewHeading.this,
					R.layout.activity_heading, result);
			lv.setAdapter(mAdap);
			mAdap.notifyDataSetChanged();
		}
	}
}
