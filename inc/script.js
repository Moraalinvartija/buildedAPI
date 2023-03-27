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

    function CreateUser() {
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
  