<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de produtos</title>
</head>
<body>
    <a href="{{ url('/') }}">Voltar</a> <a href="{{ url('/products/new') }}">Adicionar</a>
    <h3> Lista de produtos</h3> 
  
    @if ($message = Session::get('success'))
        <p>{{ $message }} </p>
    @endif   
    
    <form action="{{ url('/products') }}" method="GET">
        <input type="text" name="search" placeholder="Pesquisar produto" value="{{ $filter ?? '' }}">
        <button type="submit">Pesquisar</button>
        <a href="{{ url('/products') }}">Limpar</a>
    </form>

    <br><br>
    <table>
        <tr>
            <th>Nome</th>
            <th>Tipo</th>
            <th>Ações</th>
        </tr>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->type->name }}</td>
                <td>
                    <a href="{{ url('/products/update', ['id' => $product->id]) }}">Editar</a>
                    <a href="{{ url('/products/delete', ['id' => $product->id]) }}">Excluir</a>
                </td>
            </tr>
        @endforeach
    </table>
    
</body>
</html>