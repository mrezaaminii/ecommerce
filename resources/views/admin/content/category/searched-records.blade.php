@foreach($postCategories as $key => $postCategory)
    <tr>
        <th>{{$key+=1}}</th>
        <td>{{$postCategory->name}}</td>
        <td>{{$postCategory->description}}</td>
        <td>{{$postCategory->slug}}</td>
        <td>
            {{--                                    @php--}}
            {{--                                        dd($postCategory->image['indexArray'][$postCategory->image['currentImage']]);--}}
            {{--                                    @endphp--}}
            <img src="{{asset($postCategory->image['indexArray'][$postCategory->image['currentImage']])}}" alt="" width="40" height="40">
        </td>
        <td>{{$postCategory->tags}}</td>
        <td>
            <label for="{{$postCategory->id}}">
                <input id="{{$postCategory->id}}" onchange="changeStatus({{$postCategory->id}})" data-url="{{route('admin.content.category.status',$postCategory->id)}}" type="checkbox" @if($postCategory->status === 1) checked

                    @endif>
            </label>
        </td>
        <td class="text-left width-16-rem">
            <a href="{{route('admin.content.category.edit',$postCategory->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> ویرایش</a>
            <form class="d-inline" action="{{route('admin.content.category.destroy',$postCategory->id)}}" method="POST" id="deleteForm">
                @csrf
                {{method_field('delete')}}
                <button type="submit" class="btn btn-danger btn-sm delete"><i class="fa fa-trash-alt"></i> حذف</button>
            </form>
        </td>
    </tr>
@endforeach

