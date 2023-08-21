@php $iCount = 0; @endphp
@foreach($aProducts as $aProduct)
    <tr>
        <td><input name="SelectedProduct_{{$iCount}}" class="form-check-input" type="checkbox" class="cb-select-products" value="{{base64_encode($aProduct->id)}}" /> </td>
        <td><input name="name_{{$iCount}}" type="text" value="{{$aProduct->name}}-{{$aProduct->id}}" class="form-control"></td>
        <td><input name="type_{{$iCount}}" type="text" value="{{$aProduct->type}}" class="form-control"></td>
        
        <td><input name="price_{{$iCount}}" type="number" value="{{$aProduct->price}}" class="form-control"></td>
        <td><input name="short_description_{{$iCount}}" type="text" value="{{$aProduct->short_description}}" class="form-control"></td>
        <td><label class="switch switch-sm pe-4">
          <input name="is_featured_{{$iCount}}" type="checkbox" class="switch-input disabled" checked="" value="{{$aProduct->is_featured}}">
          <span class="switch-toggle-slider">
            <span class="switch-on"></span>
            <span class="switch-off"></span>
          </span>
        </label></td>
        <td><label class="switch switch-sm pe-4">
          <input name="is_approved_{{$iCount}}" type="checkbox" class="switch-input disabled" checked="" value="{{$aProduct->is_approved}}">
          <span class="switch-toggle-slider">
            <span class="switch-on"></span>
            <span class="switch-off"></span>
          </span>
        </label></td>
        <td><label class="switch switch-sm pe-4">
          <input name="status_{{$iCount}}" type="checkbox" class="switch-input disabled" checked="" value="{{$aProduct->status}}">
          <span class="switch-toggle-slider">
            <span class="switch-on"></span>
            <span class="switch-off"></span>
          </span>
        </label></td>
    </tr>
@php $iCount++; @endphp
@endforeach