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
                        tracksHTML += ' <div class="col-md-10"> <ul> <li class="list-group-item rounded"> '  + track.artist +  " - "  +  track.name +  " ( " + track.genre +  " ) &nbsp " ;
                        tracksHTML += ' <button class="btn btn-sm btn-outline-secondary" onClick="unvote(' + track.id + ') ">Unvote</button> <div> <button class="btn btn-sm btn-outline-secondary" onClick="posi(' + track.id + ')">Position</button> </div></li> </ul></div>';
                    });
                    document.getElementById('userVotes').innerHTML=tracksHTML;  
                }
            }
        })
    }   
}

function posi(id){

        $.ajax({
            url: "home/"+id+"/getposition",
            success:function(response)
            {
                if(response)
                {
                    tracksHTML = "";
                    response.tracks.forEach(track => {
                        if (response.id == track.id) {                        
                        tracksHTML += ' <div class="col-md-10"> <ul> <li class="list-group-item rounded"> '  + track.artist +  " - "  +  track.name +  " ( " + track.genre +  " ) &nbsp " ;
                        tracksHTML += ' <button class="btn btn-sm btn-outline-secondary" onClick="unvote(' + track.id + ') ">Unvote</button> <div><button class="btn btn-sm btn-outline-secondary" onClick="posi(' + track.id + ')">Position</button>  => Position in <i> ' + track.genre +  ' </i> standings( <b> '+ response.position +'. </b> ) with ( <i> '+ track.users_count +' </i> ) votes </div></li></ul></div>';
                        } else {
                        tracksHTML += ' <div class="col-md-10"> <ul> <li class="list-group-item rounded"> '  + track.artist +  " - "  +  track.name +  " ( " + track.genre +  " ) &nbsp " ;
                        tracksHTML += ' <button class="btn btn-sm btn-outline-secondary" onClick="unvote(' + track.id + ') ">Unvote</button> <div><button class="btn btn-sm btn-outline-secondary" onClick="posi(' + track.id + ')">Position</button></div></li></ul></div>';
                        }
                    });
                    document.getElementById('userVotes').innerHTML=tracksHTML;  
                }
            }
        })  
}

// function FilterBy() {
   
//     if (confirm("Do you really want"))
//     {
//         var genre = document.getElementById('genre').value;   
//         var artist = document.getElementById('artist').value;   
//         var nameTrack = document.getElementById('name').value;   
//         console.log(document.getElementById('genre').value);
//         $.ajax({
//             url: "/vote/filter?genre="+ genre +"&artist="+ artist +"&name="+ nameTrack,
//             success:function(response)
//             {
//                 if(response)
//                 {
//                     console.log(response);
//                     tracksHTML = "";
//                     response.forEach(track => {
//                         tracksHTML += ' <div class="col" > <form method="post" action="/vote"> <input type="hidden" id="id" name="id" value="' + track.id + '"> ';
//                         tracksHTML += ' <li class="list-group-item  rounded"> ' + track.artist + '  -  ' + track.name + ' (  ' + track.genre + ' ) ';
//                         tracksHTML += ' <input type="submit" value="Vote" > </li></form> </div>';
//                     });
//                     document.getElementById('filtred').innerHTML=tracksHTML;  
//                 }
//             }
//         })
        
//     } 
// }