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
        document.getElementById("all_clients").innerHTML = tab;
    })
    }
        async function fetchDataSingle() {                                                                           //fetch single client from database, turn json into string and remove unecessary 
            let target_id = document.getElementById("client_id_find");
            const address = 'http://localhost/clientapi/buildedapi/customers/read.php?client_id=' + target_id.value;   //add error handling
            fetch (address )
            .then((data) => {
                return data.json();
            }).then((completeData) =>{
                console.log(completeData.status)
                if (completeData.status == 200) {
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
            document.getElementById("find_table").innerHTML = tab;
                } else {
                    let tab ="<thead><tr><th>Id</th> <th>First name</th><th>Last name</th><th>Address</th> </tr></thead>";
                    tab += `<tr>
                    <td>X</td>
                    <td>Client</td>
                    <td>doesnt</td>
                    <td>exists</td>
                </tr>`;
                document.getElementById("find_table").innerHTML = tab;
                }
               
    
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
        
            var myHeaders = new Headers();
            myHeaders.append("Content-Type", "application/json");
            let fetch_fname = document.getElementById("fname_update").value
            let fetch_lname = document.getElementById("lname_update").value
            let fetch_address = document.getElementById("address_update").value
           
            
            var raw = JSON.stringify({
              'client_fname': `${fetch_fname}`,
              'client_lname': `${fetch_lname}`,
              'client_address': `${fetch_address}`
            });
            
            var requestOptions = {
              method: 'PUT',
              headers: myHeaders,
              body: raw,
              redirect: 'follow'
            };
            let target_id = document.getElementById("client_id_update");
            fetch("http://localhost/clientapi/buildedAPI/customers/update.php?client_id=" + target_id.value, requestOptions)
              .then(response => response.text())
              .then(result => console.log(result))
              .catch(error => console.log('error', error))
            
        }
    
        function deleteClient() {
            var requestOptions = {
                method: 'DELETE',
                redirect: 'follow'
              };
              let target_id = document.getElementById("client_id_delete");
              fetch("http://localhost/clientapi/buildedAPI/customers/delete.php?client_id=" +target_id.value, requestOptions)
                .then(response => response.text())
                .then(result => console.log(result))
                .catch(error => console.log('error', error));
               
                
        }
            