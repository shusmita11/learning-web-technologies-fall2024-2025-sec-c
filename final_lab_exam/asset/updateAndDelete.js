function confirmUpdate()
{
    window.location.href = "../view/update.php";
}

function confirmDelete()
{
    const updateData = JSON.stringify({
        check: "check"
    });

    //alert(regData);
    
    // AJAX request
    const xhttp = new XMLHttpRequest();
    xhttp.open("POST", "../controller/deleteModel.php", true);
    console.log('flag 1');
    xhttp.setRequestHeader("Content-type", "application/json");
    xhttp.send(updateData);

    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200){
            console.log("response:", this.responseText);
            const response = this.responseText;

            if(response === 'success')
            {
                alert("Delete Successful");
                window.location.href = "../view/dashboard.php";
            }

            else
            {
                alert("Delete Unsuccessful");
            }
        }
    };
}