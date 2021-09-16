@extends('layouts.app', ['title' => 'API Documentation', 'description' => 'The MetaDiablo API (application programming interface) is an interface that enables third-party applications to access data directly from the MetaDiablo servers. The current version of the API is version 1.'])

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h1 class="h4">MetaDiablo API Documentation</h1></div>

                    <div class="card-body">
                            <div class="row">
                                <div class="col col-form-label">
                                    <h2 class="h5">The MetaDiablo API offers access to resources based on Diablo II.</h2>
                                    <p>The MetaDiablo API provides resoures such as cube recipes, entire resources for unique items, runewords, and more! You can use these in your own custom applications!</p>
                                    <hr>
                                    <p><h3 class="h5">Authentication</h3>
                                    All of the endpoints which fetch account data require the use of an API key. There are currently two ways to provide an API key along with your request.
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Adding the <code>Authorization</code> HTTP header to your request with the value <code>Bearer &lt;API key&gt;</code>.</li>
                                        <li class="list-group-item">Adding the parameter <code>?api_token=&lt;API key&gt;</code> to your request URL.</li>
                                    </ul>
                                    </p>
                                    <hr>
                                    <p><h3 class="h5">Localisation</h3>
                                    <code>Work in Progress</code>
                                    </p>
                                    <hr>
                                    <!--All of the endpoints which are locale-aware accept a language parameter. There are currently two ways to provide this language parameter along with your request. 
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Adding the <code>Accept-Language</code> HTTP header with the value of <code>&lt;language&gt;</code>, which also gets set by the browser by default.</li>
                                        <li class="list-group-item">Adding the parameter <code>?lang=&lt;language&gt;</code> to your request URL.</li>
                                    </ul>
                                    If no language parameter is set, the language defaults to <code>en</code>. 
                                    </p>-->
                                    <p><h3 class="h5">Responses</h3>
                                    API requests will return a JSON response body describing the requested content, or error message, if applicable. Additionally, the <a href="https://en.wikipedia.org/wiki/List_of_HTTP_status_codes" target="_blank">HTTP response code</a> can be used to determine the state of the response body. 
                                    <hr>
                                    <h4 class="h6 font-weight-bold">Success</h4>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">HTTP <code>200</code> will be returned if all of the requested data has been returned.</li>
                                    </ul>
                                    <h4 class="h6 font-weight-bold">Errors</h4>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">HTTP <code>302</code> will be returned if attempting to access an authenticated endpoint without a valid API key, or with a valid API key without the necessary permissions. Redirected location is <code>/login</code>.</li>
                                        <li class="list-group-item">HTTP <code>404</code> will be returned if an endpoint does not exist, or all of the provided IDs are invalid.</li>
                                    </ul>
                                    </p>
                                    
                                </div>
                            </div>
                            <div class="form-group row">
                            <div class="col">
                            The base URL for all endpoints is <code>https://api.metadiablo.com/v1</code>.
                            <table class="table table-sm text-light table-borderless">
                                <thead>
                                    <tr>
                                    <th scope="col">Active endpoints</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">/items/runewords</th>
                                </tr>
                                <tr>
                                    <th scope="row">/items/runes</th>
                                </tr>
                                <tr>
                                    <th scope="row">/cube</th>
                                </tr>
                                <tr>
                                    <th scope="row">/items/gems</th>
                                </tr>
                                <tr>
                                    <th scope="row">/items/uniques</th>
                                </tr>
                                </tbody>
                            </table>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
