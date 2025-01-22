function searchDoctors()
{
    const searchType = document.getElementById("searchType").value;
    const searchQuery = document.getElementById("searchQuery").value.trim();

    if (searchQuery === "")
    {
        alert("Please enter a search query.");
        return;
    }

    // AJAX request
    const xhttp = new XMLHttpRequest();
    xhttp.open("POST", "../controller/searchDoctorCheck.php", true);
    xhttp.setRequestHeader("Content-Type", "application/json");

    xhttp.onload = function ()
    {
        if (xhttp.status === 200)
        {
            document.getElementById("doctorTableBody").innerHTML = xhttp.responseText;
        }
        
        else
        {
            alert("Error: Unable to fetch data.");
        }
    };

    // JSON
    const requestData = JSON.stringify({
        searchType: searchType,
        searchQuery: searchQuery,
    });

    xhttp.send(requestData);
}
