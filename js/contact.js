var count = 1;


function loading(){
        $(document).ready(function () {
            $("#fix").click(function () {
                if(count == 1){
                    $("#myModal2").modal({ backdrop: "true" });
                    count++;
                }
            });
        })
}


 function contactPageDisplay(){
    if(count!=1) {
        let parent = document.querySelector('#fix');
        parent.querySelector("a").href= 'contactUs.html';
    }
}

