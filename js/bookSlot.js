function checkDate() {
    const givenDateInput = document.getElementById('date');
    const currentDate = new Date(); // current date and time
    const givenDate = new Date(givenDateInput.value); // given date

    if(document.querySelector('#name').value =="" || document.querySelector('#email').value=="" || document.querySelector('#age').value=="" ||document.querySelector('#phNo').value=="" ||document.querySelector('#streetName').value==""||document.querySelector('#district').value==""||document.querySelector('#ps').value==""||document.querySelector('#po').value=="" ||document.querySelector('#id_num').value==""||document.querySelector('#g_name').value==""||document.querySelector('#g_ph').value=="" || document.querySelector('#vacDist').value=="Select District" || document.querySelector('#vacCenter').value=="Select Vaccine Center" || document.querySelector('#date').value=="" ||document.querySelector('#dose').value=="Select vaccine dose"){
        alert('Please fill all the field');
        return false;
    }
    else if(givenDate.getTime() < currentDate.getTime()){
        alert('The given date is in the past');
        return false;
    }
    else{
        return true;
    }
}
