package com.abhinav.news2;

import java.util.ArrayList;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.view.Menu;
import android.view.View;
import android.widget.AdapterView;
import android.widget.AdapterView.OnItemClickListener;
import android.widget.ArrayAdapter;
import android.widget.ListView;

public class MainActivity extends Activity {

	private ArrayAdapter<String> listAdap;
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_main);
		
		final ListView lv = (ListView)findViewById(R.id.lv1);
		ArrayList<String> list = new ArrayList<String>();
		
		listAdap = new ArrayAdapter<String>(this,
                android.R.layout.simple_list_item_1,
                list);
		list.add("Times of India");
		list.add("The Hindu");
		list.add("Deccan Chronicle");
		list.add("Hindustan Times");
		
lv.setAdapter(listAdap);
		
		lv.setOnItemClickListener(new OnItemClickListener() 
		{
				public void onItemClick(AdapterView<?> parent, View view,
			    int position, long id) 
				{
					
					String papName =(String) (lv.getItemAtPosition(position));
					Intent intent = new Intent(getApplication(), ListViewHeading.class);
					if(papName=="Times of India")
					{
						intent.putExtra("id",1);
						
					}
					else if(papName=="The Hindu")
					{
						intent.putExtra("id",2);
						
					}
					else if(papName=="Deccan Chronicle")
					{
						intent.putExtra("id",3);
						
					}
					
					
					startActivity(intent);
					overridePendingTransition(R.anim.anim1, R.anim.anim2);
				}
	
		});
	}

	@Override
	public boolean onCreateOptionsMenu(Menu menu) {
		// Inflate the menu; this adds items to the action bar if it is present.
		getMenuInflater().inflate(R.menu.main, menu);
		return true;
	}

}
