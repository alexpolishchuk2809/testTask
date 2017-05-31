To launch the project you need to create new host for your local project, new DB and set the appropriate settings in the database.php file.
Then you need to configure .env file and run the create_visitors_table migration for creating visitors table in your DB.

Home page is responsible for handling the request and store all required information into database.
P.S.: Now I`m using the generateRandomIP method in Visitors.php file for getting random visitor IP (for testing in your local server). To get the real IP you need to uncomment the 30 line ($ip = $this->_request->ip();) (if you run the project in any hosting).

Activity page displays the information about current visitor, total count of unique visitors and count of visitors for the current day.
On the map which is located under this data you can see the locations of site visitors.