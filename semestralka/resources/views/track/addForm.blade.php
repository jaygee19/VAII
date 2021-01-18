<div class="container">
    <p></p>
        <div class="form-group text-danger">
            @foreach ($errors->all() as $error)
            {{ $error }}<br>
            @endforeach
        </div>
    <form method="post" action="{{ $action}}"> 
        @csrf
        @method($method)
        <div class="form-row">
            <div class="col-4">
                <input type="text" class="form-control" id="artist" name="artist" value="{{ old('artist', @$model->artist) }}" placeholder="Artist" required>
            </div>
            <div class="col-4">
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name',@$model->name) }}" placeholder="Name" required>
            </div>
            <div class="col">
                <select type="text" class="form-control" id="genre" name="genre" required>
                <option selected value="{{ old('genre',@$model->genre) }}">Genre...</option>
                <option value="BigRoom">BigRoom</option>
                <option value="DnB">DnB</option>
                <option value="Hardstyle">Hardstyle</option>
                <option value="Progressive">Progressive</option>
                <option value="PsyTrance">PsyTrance</option>
                <option value="Trance">Trance</option>
                </select>
            </div>
            <div class="col">
                <input type="text" class="form-control" id="album_id" name="album_id" value="{{ old('album_id',@$model->album_id) }}" placeholder="ID Album">
            </div>
        </div>
        <p></p>
            <div>
            <div>
            <p></p>
        <input type="submit" value="Send" >
        </div>
    </form>
</div>






