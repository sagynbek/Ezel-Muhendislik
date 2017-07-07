@if(Auth::check())
	</textarea>
	<br>

	<div class="row">
		<div class="col-md-12">
		      <div class="form-group">
			      <span class="label label-default">Seo İçin İçerik Ekleyin (160 karakter)</span>
		    	  <input name="seo" type="text"  class="form-control input-md" placeholder="Seo İçin İçerik Ekleyin" value="{{ $text->seo }}" maxlength="160" required>
		      </div>
		    </div>
		    <div class="col-md-12">
		      <div class="form-group">
		      	<button type="submit" class="btn btn-block btn-success btn-lg">Kaydet</button>
		        <button type="reset" class="btn btn-block btn-warning">En son kaydedilmiş haline getir</button>
		        <input type="submit" name="factory" class="btn btn-block btn-danger" onclick="confirm('TÜM YAZILAR KAYBOLUR, İLK HALE GETİRİLİR!')" value="En ilk haline getir (geri getirilmez)"></input>
		      </div>
		    </div>
	</div>

	<input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
@endif
