<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CarShop</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>
  <body>
    <div class="mx-auto container">
        <h1 class="text-4xl font-bold my-5 text-black text-center">CarShop</h1>
        
        <div class="cars-list p-4">
          <div class="my-2">
            <form class="filter-form" method="get" action="/">
              <span class="text-sm p-2 mr-2 font-bold">Filters: </span>
              <select name="field" class="form-select appearance-none w-30 text-sm p-2 mr-2 text-gray-700 bg-white border border-solid border-gray-300">
                <option value="">Order by</option>
                @foreach ($fields as $field)
                <option {{ ($field == $selected_field ) ? 'selected' : '' }} value="{{$field}}">{{$field}}</option>
                @endforeach
              </select>

              <select name="type" class="form-select appearance-none w-30 text-sm p-2 text-gray-700 bg-white border border-solid border-gray-300">
                <option value="">Type</option>
                @foreach ($types as $type)
                <option {{ ($type == $selected_type ) ? 'selected' : '' }} value="{{$type}}">{{$type}}</option>
                @endforeach
              </select>
            </form>
          </div>
          <div class="overflow-x-auto">
          <table  class="table-auto table-fixed w-full text-center">
            <thead>
              <tr>
                <th class="border p-1 w-32">Make</th>
                <th class="border p-1 w-32">Model</th>
                <th class="border p-1 w-32">Year</th>
                <th class="border p-1 w-32">Condition</th>
                <th class="border p-1 w-32">Price</th>
                <th class="border p-1 w-32">Status</th>
                <th class="border p-1 w-32">Seller</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($cars as $car)
              <tr>
                <td class="border p-1">
                {{ $car->make }}
                </td>
                <td class="border p-1">
                {{ $car->model }}
                </td>
                <td class="border p-1">
                {{ $car->year }}
                </td>
                <td class="border p-1">
                {{ $car->condition }}
                </td>
                <td class="border p-1">
                {{ $car->price }}
                </td>
                <td class="border p-1">
                {{ $car->status }}
                </td>
                <td class="border p-1">
                {{ $car->seller }}
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          </div>
          <div class="py-5">
          {{ $cars->appends(['field' => $selected_field, 'type' => $selected_type])->links() }}
          </div>
        </div>
    </div>
  </body>
</html>
