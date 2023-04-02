# buildedAPI
PHP REST API to create, read, update and delete tables from MySQLi database

<h1>Description</h1>
<div>1. This is selfmade REST API where data is created, read, updated and deleted with fetch requests. This project also includes user interface where user
   can use the API from the website. The idea of this project has been to help me understand how REST operates so there might be some unnessacry things in the code, cause this is my first REST API</div>
<h2>Example video</h2>
https://user-images.githubusercontent.com/100047926/229362740-f5d3b6dd-6e3d-436c-9e94-9b3e4f126a62.mp4
<h2>Installation:</h2>
<div>To use this API you need to:</div>
<div>1. Download git files.</div>
<div>2. XAMP (or something alike) to host mysql database and to use php files inside the API app.</div>

<h2>Structure:</h2>
<div>1. Inside Assets we have background image for website and favicon for website icon, nothing that is needed to run the website.</div>
<div>2. Customers folder included all CRUD functions for REST Api (Create,Delete,Read, Update). Function.php inside includes
   functions how requests are send to database. Here are also server messages that are sent when something is missing
   (client first name, client last name etc.). </div>
<div>3. Inc. includes dbcon.php where sql dabatase connection info is handled.</div>
   Script.js has all the fetch requests in javascript that are needed to run this app.</div>
<div>4. SQL folder has SQL for the database file that you can import into XAMP.</div>


<h2>Javascript</h2>
<h3>1. function fetchDataAll() </h3>
<h4>Description</h4>
<div> fetch function that fetches all data from SQL database customers table, returns it as json and then prints them into all_clients 
table inside index.html.</div>
<br>
<div> 1. Data is fetched from database</div>
<div> 2. Data is turned into JSON</div>
<div> 3. Variable "tab" is made with table headers</div>
<div> 4. For loop that saves every clients id, first name, last name and address as a row into variable "tab"</div>
<div> 5. Variable "tab" is inserted into "all_clients" table<div><br>

<h3>2. function fetchDataSingle()</h3>
<h4>Description</h4>
<div> fetch function that fetches single client from database customers table, returns it as json and then prints it into "find_table" table inside index.html.</div>
<br>
<div> 1. let variable "target_id" is made and is defined from document.getElementByID"client_id_find". "client_id_find" is defined from user input that is located at index.html</div>
<div> 2. Data is fetched from database (fetch address is defined and "target_id" is placed as last so that program knows which client to search)</div>
<div> 3. Status code from the server is checked. If status is 200(meaning data with user given id is found) then data fetched is printed into "find_table" table that is located at the index.html </div>
<div> 4. If server message is anything else than 200 --> filler text (that tell user no such clients exists) is printed into "find_table" instead</div>
<br>
<h3>3. function CreateUser()</h3>
<h4>Description</h4>
<div> fetch function that creates new client into SQL databse customers table from user given data</div>
<br>
<div> 1. New variable formdata is created as new FormData (keys and values) </div>
<div> 2. Variables for first name, last name and address are made from the values given by user in index.html</div>
<div> 3. first name, last name and address variables are places into fromdata variable</div>
<div> 4. Request info are given that server knows what is beind done -> method:post, body:formdata </div>
<div> 5. formdata is send to server with fetch to create new user</div>
<br>
<h3>3. function UpdateClient()</h3>
<h4>Description</h4>
<div> fetch function that modifies/updates existing client (chosen by user) in SQL database to match values given by user</div>
<br>
<div> 1. Variables "first name", "last name" and "address" are defined from user given input</div>
<div> 2. Variable raw is made and variables "first name", "last name" and "address" are placed inside</div>
<div> 3. Request info are given that server knows what is beind done -> method:put, body:raw</div>
<div> 4. Variable "target_id" is defined from user input (so that code knows which client data is to be modified) </div>
<div> 5. Fetch is send to server to update client to match user given data</div>
<br>
<h3>3. function deleteClient()</h3>
<h4>Description</h4>
<div> fetch function that deletes client from SQL database</div>

<div> 1. Request info are given that server knows what is beind done -> method:delete</div>
<div> 2. Variable target_id is defined from user given input </div>
<div> 3. fetch is send to server to delete client that´s id matches user given id</div>
<div> </div>
<br>

<h2>PHP</h2>
<h4>Description</h4>
<div> CRUD operations that REST API needs to function</div> 

<h3>1. Create.php</h3>
<h4>Description</h4>
<div> This is a procedure that generates new records through an ‘INSERT’ statement. Headers are also defined here for the operation so that nothing else than allowed method is accepted</div>
<h3>1. Delete.php</h3>
<h4>Description</h4>
<div> This is a procedure used to remove one entri entirely. Headers are also defined here for the operation so that nothing else than allowed method is accepted</div>
<h3>1. Read.php</h3>
<h4>Description</h4>
<div> This is a procedure used to read/retrieve data based on desired input parameters. Headers are also defined here for the operation so that nothing else than allowed method is accepted</div>
<h3>1. Update.php</h3>
<h4>Description</h4>
<div> This is a procedure used to modify records without overwriting them. Headers are also defined here for the operation so that nothing else than allowed method is accepted</div>
<h2> Versions</h2>
<h3> Here are list what changes has been made into the code in every version. Version numbers are kinda stupid cause I didint realize first how version numbers are defined...so bear with them</h3>
<h4>Version 1.1</h4>
<div>Read operation and connection info are added</div>
<h4>Version 1.2</h4>
<div>Post operation is added</div>
<h4>Version 1.3</h4>
<div>Code to find 1 customer only is added</div>
<h4>Version 1.4</h4>
<div>Upadate operation is added</div>
<h4>Version 1.5</h4>
<div>Delete operaton,javascript fetch function to fill table are added. Started to work index.html user interface for API.</div>
<h4>Version SQL File</h4>
<div>SQL file is inserted into mix</div>
<h4>Version 1.51</h4>
<div>Started to work more with javascript fetch functions. CreateUser() function added. More user interface fiddling</div>
<h4>Version 1.52</h4>
<div>updateClient() fetch function is added. User interface fiddling continues</div>
<h4>Version 1.53</h4>
<div>Scrapped styles.css from code. -> Turned website to work with bootstrap. Javascript functions modified added last fetch functions to code fetchDataSingle and deleteClient. </div>
<h4>Version 1.55</h4>
<div>Changed sidebar background colors opacity</div>

