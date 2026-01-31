function toggleForm() 
{
    var selection = document.getElementById("userType").value;
    var form = document.getElementById("form");

    if (selection === "Individual") 
        {
        document.querySelector('.individual-form').style.display = "block";
        document.querySelector('.team-form').style.display = "none";
       form.style.height = "400px"

    } 
    else 
    {
        document.querySelector('.individual-form').style.display = "none";
        document.querySelector('.team-form').style.display = "block";
        form.style.height = "850px";

    }
}