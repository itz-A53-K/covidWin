//alert close
document.querySelector('#closeAlert').addEventListener("click",(e)=>{
    currentUrl=window.location.href;
    cutUrl=currentUrl.slice(0,currentUrl.indexOf('?'));
    // console.log(cutUrl);
    // document.querySelector('.alert').classList.add('hidden');
        // window.location = cutUrl;
        location.reload(true);

})

