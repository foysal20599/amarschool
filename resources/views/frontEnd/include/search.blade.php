<div class="banner-w3layouts-info">
	<div id="search_form" class="search_top text-center">
		<h3>Search your favourite place</h3>
		<p>Apartment and Falt</p>
		<form action="#" method="post" class="ban-form row">
			<div class="col-md-3 banf">
				<select class="form-control" id="country12">
					<option selected disabled>Select your category</option>
					<option>Aparments</option>
					<option>Flat</option>
					<option>Bachelor</option>
				</select>
			</div>
			<div class="col-md-3 banf">
				<select class="form-control" id="country12">
					<option selected disabled>Location</option>
					<option>Uk</option>
					<option>USA</option>
					<option>France</option>
				</select>
			</div>
			{{-- <div class="col-md-3 banf"  id="country12">
			<input class="form-control" type="date" id="country12" >
			</div> --}}
			<div class="col-md-3 banf">
				<input id="txtdate" type="text" name="date" class="form-control  @error('date') is-invalid @enderror" placeholder="Select Date">
			</div>
			<div class="col-md-3 banf">
				<input class="form-control" type="submit" value="Search">
			</div>
		</form>
	</div>
</div>
</div>




@push('script')
<script>

    $(document).ready(function () {
        $("#txtdate").datepicker({
            minDate: 0
        });
    });
    </script>

@endpush



