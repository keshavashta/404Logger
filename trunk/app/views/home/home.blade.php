@extends('layouts.common')
@section('content')
<div class="row">
    <div class="col-md-12">
        <h3>Logs</h3>
    </div>
    <div class="pull-right col-md-4">
        <form class="well" method="get" action="<% URL::to('/') %>">
            <div class="input-group">
                <input type="text" class="form-control" name="domain">
      <span class="input-group-btn">
        <button class="btn btn-default" type="submit">Search</button>
      </span>
            </div>
            <!-- /input-group -->
        </form>
    </div>
    <!-- /.col-lg-6 -->
</div>

<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Domain</th>
                    <th>URL</th>
                    <th>Http Referrer</th>
                    <th>Visited Date</th>
                    <th>IP</th>
                </tr>
                </thead>
                @if(logs->getTotal()==0)
                <tbody>
                <tr>
                    <td colspan="6 style="text-align: center">
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

            @foreach ($logs as $row)
            <tr>
                <td>&nbsp;</td>
                <td><% $row->id %></td>
                <td><% $row->domain %></td>
                <td><% $row->url %></td>
                <td><% $row->httpReferrer %></td>
                <td><% $row->visitedAt %></td>
                <td><% $row->ip %></td>

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