@php $iCount = 0; $sStatus = ""; @endphp
@foreach($aProducts as $aProduct)
@php
$sIsFeatured = ($aProduct->is_featured == 1 ? "checked=checked" : "");
$sIsApproved = ($aProduct->is_approved == 1 ? "checked=checked" : "");
$sStatus = ($aProduct->status == 1 ? "checked=checked" : "");
@endphp
<tr>
    <td><input name="SelectedProduct_{{$iCount}}" class="form-check-input cb-element" type="checkbox" value="{{base64_encode($aProduct->id)}}" /> </td>
    <td style="width:20%"><input name="name_{{$iCount}}" type="text" value="{{$aProduct->name}}-{{$aProduct->id}}" class="form-control"></td>
    <td style="width:15%"><input name="type_{{$iCount}}" type="text" value="{{$aProduct->type}}" class="form-control"></td>
    <td style="width:30%">
    
        <select name="category_id_{{$iCount}}" class="select2 form-select form-select-lg form-control category_id" data-allow-clear="true">
            <option value="">-</option>
            @foreach($objCategories as $objCategory)
            <option value="{{$objCategory->id}}" {{($aProduct->category_id == $objCategory->id ? "Selected=Selected" : "")}}>{{$objCategory->name}}</option>
            @endforeach
        </select>
        <script>
        $(".category_id").select2({});
        </script>
    </td>

    <td style="width:15%"><input name="price_{{$iCount}}" type="number" value="{{$aProduct->price}}" class="form-control"></td>
    <td style="width:20%"><input name="short_description_{{$iCount}}" type="text" value="{{$aProduct->short_description}}" class="form-control"></td>
    <td><label class="switch switch-sm pe-4">
            <input name="is_featured_{{$iCount}}" type="checkbox" class="switch-input" {{$sIsFeatured}}>
            <span class="switch-toggle-slider">
                <span class="switch-on"></span>
                <span class="switch-off"></span>
            </span>
        </label></td>
    <td><label class="switch switch-sm pe-4">
            <input name="is_approved_{{$iCount}}" type="checkbox" class="switch-input" {{$sIsApproved}}>
            <span class="switch-toggle-slider">
                <span class="switch-on"></span>
                <span class="switch-off"></span>
            </span>
        </label></td>
    <td><label class="switch switch-sm pe-4">
            <input name="status_{{$iCount}}" type="checkbox" class="switch-input" {{$sStatus}}>
            <span class="switch-toggle-slider">
                <span class="switch-on"></span>
                <span class="switch-off"></span>
            </span>
        </label></td>
</tr>
@php $iCount++; @endphp
@endforeach