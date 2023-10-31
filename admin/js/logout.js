//logout
logoutBtn= document.querySelector('.logoutBtn');
logoutBtn.addEventListener("click", (e)=>{
        if(confirm("Do you really want to logout?")) document.location = '../partial/_logoutFunctional.php';
     
})
