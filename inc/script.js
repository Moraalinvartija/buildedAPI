fetch("http://localhost/clientapi/buildedapi/customers/read.php").then((data)=> {
    return data.json();
}).then((objectData)=>{
    console.log(objectData.data[0].client_fname);
    let tab ="";

    for (let r of objectData.data) {
        tab += `<tr>
        <th>${r.client_id}</th>
        <th>${r.client_fname}</th>
        <th>${r.client_lname}</th>
        <th>${r.client_address}</th>     
    </tr>`;
    //console.log(tab);
    }
    document.getElementById("customers_table").innerHTML = tab;
})

