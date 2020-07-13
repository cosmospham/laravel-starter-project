<form class="form-row align-items-center" method="get">
    <div class="col-auto mb-2">
        <label for="keyword" class="sr-only">Keyword</label>
        <input type="text" class="form-control" id="keyword" name="keyword" value="{{ $keyword }}" placeholder="enter keyword">
    </div>
    <div class="col-auto">
        <button type="submit" class="btn btn-primary mb-2">Search</button>
    </div>
</form>
