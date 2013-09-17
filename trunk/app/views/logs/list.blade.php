@extends('layouts.common')
@section('content')

<div class="row">

    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>URL</th>
                    <th>HTTP Referrer</th>
                    <th>Visited at</th>
                    <th>IP</th>
                    <th>Website Id</th>
                </tr>
                </thead>
                @if($websites->getTotal()==0)
                <tbody>
                <tr>
                    <td colspan="3" style="text-align: center">
                        <br/>
                        <strong>
                            No Data Found
                        </strong>
                        <br/>
                        <br/>
                    </td>
                </tr>
                </tbody>
            </table>
            @else
            <tbody>

            <?php $count = 1;?>
            @foreach ($websites as $row)
            <tr >
                <td><%(($logs->getCurrentPage() - 1) * Constants::PAGING_COUNT + $count++)%></td>
                <td><% $row->url %></td>
                <td><% $row->httpreferrer%></td>
                <td><% $row->visitedAt%></td>
                <td><% $row->ip%></td>
                <td><% $row->websiteId%></td>
            </tr>
            @endforeach
            </tbody>
            </table>
            <?php echo $logs->links(); ?>
            @endif
            </table>
        </div>
    </div>
</div>
@stop