function confirmDelete(theUrl,message)
{
    if(confirm(message)){
        window.location.href=theUrl;

    }
    else{
        return false;
    }
}