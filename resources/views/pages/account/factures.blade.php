<div class="tab-pane fade" id="factures" role="tabpanel">
    <div class="myaccount-content">
        <h3 style="color: #14287B;"><i class="fa fa-file-pdf"></i> {{ translating('factures') }}</h3>
        @if(isset($factures) && count($factures) > 0)
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">{{ translating('facture-id') }}</th>
                  <th scope="col">{{ translating('created-at') }}</th>
                  <th scope="col">{{ translating('file') }}</th>
                </tr>
              </thead>
              <tbody>
                @foreach($factures as $key => $facture)
                    <tr>
                      <th scope="row">{{ ++$key }}</th>
                      <td>{{ $facture->id }}</td>
                      <td>{{ $facture->updated_at }}</td>
                      <td><a href="{{ route('download-pdf', ['locale' => app()->getLocale(), 'id' => $facture->id]) }}"><i class="fa fa-file-pdf"></i></a></td>
                    </tr>
                @endforeach
              </tbody>
            </table>
        @endif
    </div>
</div>