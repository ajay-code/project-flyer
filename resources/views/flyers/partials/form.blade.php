@inject('countries', 'App\Http\Utilities\Country')
<legend>Selling your home</legend>
{{csrf_field()}}
    <div class="form-group">
        <label for="street">Street:</label>
        <input type="text" class="form-control" name="street" id="street" placeholder="Input field" value="{{old('street')}}" required>
    </div>

    <div class="form-group">
        <label for="city">city:</label>
        <input type="text" class="form-control" name="city" id="city" placeholder="Enter your City" value=" {{old('city')}} " required>
    </div>

    <div class="form-group">
        <label for="zip">ZipCode:</label>
        <input type="text" class="form-control" name="zip" id="zip" placeholder="Enter Your Zip Code" value=" {{old('zip')}} " required>
    </div>

    <div class="form-group">
        <label for="country">Country:</label>

        <select name="country" id="country" class="form-control" required="required">
        @foreach($countries::all() as $country => $code)
             <option value="{{$code}}">{{$country}}</option>
        @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="state">State:</label>
        <input type="text" class="form-control" name="state" id="state" placeholder="placeholder" value=" {{old('state')}} " required>
    </div>

    <div class="form-group">
        <label for="price">Price</label>
        <input type="text" class="form-control" name="price" id="price" placeholder="placeholder" value=" {{old('price')}} " required>
    </div>

    <div class="form-group">
        <label for="description">Home description</label>
        <textarea name="description" id="description" class="form-control" rows="10" required="required">{{old('description')}}</textarea>

    </div>

    <div class="form-group">
        <label for="photos">Photos:</label>
        <input type="file" class="form-control" name="photos" id="photos" placeholder="placeholder" value=" {{old('photos')}} " required>
    </div>

    <button type="submit" class="btn btn-primary ">Create Flyer</button>