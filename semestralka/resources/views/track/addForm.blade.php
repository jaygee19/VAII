<div class="container">
    <h4> Add song: </h4>
    <p></p>
    <form method="post" action="{{ $action}}"> 
        @csrf
        @method($method)
        <input type="text" id="artist" name="artist" value="" placeholder="artist" required>
        <div>
            <p></p>
                <input type="text" id="name" name="name" value="" placeholder="name" required>
        </div>
        <div>
            <p></p>
                <input type="text" id="genre" name="genre" value="" placeholder="genre" required>
        </div>
        <div>
            <p></p>
        <input type="submit" value="Send" >
        </div>
    </form>
</div>






