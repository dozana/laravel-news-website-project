<table class="table table-bordered">
    <tbody>
    @foreach($section_three as $three)
        <tr>
            <td class="align-middle text-center">
                <a href="{{ url('/news/details/'.$three->id.'/'.$three->news_title_slug) }}">
                    <img style="width: 80px; height: 40px;" class="img-fluid" src="{{ asset($three->image) }}" alt="{{ $three->news_title }}">
                </a>
            </td>
            <td class="align-middle"><a href="{{ url('/news/details/'.$three->id.'/'.$three->news_title_slug) }}">{{ $three->news_title }}</a></td>
        </tr>
    @endforeach
    </tbody>
</table>
