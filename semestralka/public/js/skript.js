function unvote(id){

    if (confirm("Do you really want to delete this track?"))
    {
        $.ajax({
            url: "vote/"+id+"/delete",
            success:function(response)
            {
                if(response)
                {
                    tracksHTML = "";
                    response.forEach(track => {
                        tracksHTML += ' <div class="col-md-8"> <li class="list-group-item rounded"> '  + track.artist +  " - "  +  track.name +  "(" + track.genre +  ") &nbsp " ;
                        tracksHTML += ' <button id="del" onClick="unvote(' + track.id + ') ">Unvote</button> </li> </div>';
                    });
                    document.getElementById('userVotes').innerHTML=tracksHTML   
                }
            }
        })
    }   
}
