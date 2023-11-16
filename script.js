document.querySelectorAll('.itemLink').forEach(link =>{
   
    link.classList.remove('activePage');

    if(link.href === window.location.href){
        link.classList.add('activePage');
    }
    
})
//alert close
document.querySelector('#closeAlert').addEventListener("click",(e)=>{
    currentUrl=window.location.href;
    cutUrl=currentUrl.slice(0,currentUrl.indexOf('?'));
    // console.log(cutUrl);
    // document.querySelector('.alert').classList.add('hidden');
        // window.location = cutUrl;
        location.reload(true);

})


