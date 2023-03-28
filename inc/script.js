async function fetchDataAll() {                                                                     // fetch all client data from database
fetch("http://localhost/clientapi/buildedapi/customers/read.php").then((data)=> {
    return data.json();
}).then((objectData)=>{
    //console.log(objectData.data[0].client_fname);
    let tab ="<thead><tr><th>Id</th> <th>First name</th><th>Last name</th><th>Address</th> </tr></thead>";

    for (let r of objectData.data) {
        tab += `<tr>
        <td>${r.client_id}</td>
        <td>${r.client_fname}</td>
        <td>${r.client_lname}</td>
        <td>${r.client_address}</td>     
    </tr>`;
    //console.log(tab);
    }
    document.getElementById("customers_table").innerHTML = tab;
})
}
    async function fetchDataSingle() {                                                                           //fetch single client from database, turn json into string and remove unecessary 
        let target_id = document.getElementById("client_id_find");
        const address = 'http://localhost/clientapi/buildedapi/customers/read.php?client_id=' + target_id.value;   //add error handling
        fetch (address ).then((data) => {
            return data.json();
        }).then((completeData) =>{
            console.log(completeData.data)
            let fetch_id = JSON.stringify(completeData.data["client_id"]);
            let fetch_fname = JSON.stringify(completeData.data["client_fname"]);
            let fetch_lname = JSON.stringify(completeData.data["client_lname"]);
            let fetch_address = JSON.stringify(completeData.data["client_address"]);
            let tab ="<thead><tr><th>Id</th> <th>First name</th><th>Last name</th><th>Address</th> </tr></thead>";
            tab += `<tr>
            <td>` + replacer(fetch_id) +`</td>
            <td>` + replacer(fetch_fname) +`</td>
            <td>` + replacer(fetch_lname) +`</td>
            <td>` + replacer(fetch_address) +`</td>
        </tr>`;
    document.getElementById("customers_table").innerHTML = tab;

        })
    }
    function CreateUser() {                                                                                 //create new user into database
      var formdata = new FormData();
          var fname = document.getElementById('fname').value;
          var lname = document.getElementById('lname').value;
          var address = document.getElementById('address').value;
          formdata.append("client_fname", fname);
          formdata.append("client_lname", lname);
          formdata.append("client_address", address);
  
          var requestOptions = {
          method: 'POST',
          body: formdata,
          redirect: 'follow'
  };
  fetch("http://localhost/clientapi/buildedapi/customers/create.php", requestOptions)
    .then(response => response.text())
    .then(result => console.log(result))
    .catch(error => console.log('error', error));
  }
  
        function remove(string){
            string = string.replaceAll('"','');
            return string;
        }
        function replacer(b){
            const search = '"';
            const replace = '';
            
            b = b.replaceAll(search, replace);
            return b;

        }

    function updateClient() {
        let url ="localhost/clientapi/buildedapi/customers/update.php?client_id=1";
        var myHeaders = new Headers();
        myHeaders.append("Content-Type", "application/json");

        let payload = {
            client_fname: "1",
            client_lname: "2",
            client_address: "3"
        }

        let options = {
            method: 'PUT',
         //   headers: myHeaders,
            body: JSON.stringify(payload),
            redirect: 'follow'
        }

        fetch(url, options). then(response=> console.log(response.status))
    }
        
    var requestOptions = {
        method: 'DELETE',
        redirect: 'follow'
      };
      
      fetch("localhost/clientapi/buildedapi/customers/delete.php?client_id=31", requestOptions)
        .then(response => response.text())
        .then(result => console.log(result))
        .catch(error => console.log('error', error));
        