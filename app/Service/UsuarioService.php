<?php

namespace App\Service;

use App\Models\Usuario;

class UsuarioService
{
    public function create(array $dados)
    {
        $user = Usuario::create([
            'nome' => $dados['nome'],
            'email' => $dados['email'],
            'password' => $dados['password']
        ]);
        return $user;
    }

    public function update (array $dados)
    {
        $usuario = Usuario::find($dados['id']);

        if (isset($dados['nome'])){
            $usuario->nome = $dados['nome'];
        }

        if (isset($dados['passwword'])){
            $usuario->nome = $dados['password'];
        }

        if (isset($dados['email'])){
            $usuario->nome = $dados['email'];
        }

        $usuario->save();

        return[
            'status' => true,
            'massage'=> 'Atualizado com sucesso'
        ];
    }

    public function delete($id)
    {
        $usuario = Usuario::find($id);

        if ($usuario == null){
            return [
                'status'=> false,
                'massage'=> 'Usuario nao encontrado'
            ];
        }

        $usuario->delete();

        return[
            'status'=> true,
            'message'=> 'Usuarios excluido com sucesso'
        ];
    }


    public function findById($id)
    {
        $usuario = Usuario::find($id);

        if ($usuario == null) {
            return [
                'status' => true,
                'message' => 'Usuario não encontrado'
            ];
        }
        return [
            'status' => true,
            'massage' => 'Usuario encontrado',
            'data' => $usuario
        ];
    }

    public function getAll()
    {
        $usuario = Usuario::all();
        return [
            'status'=> true, 
            'massage'=> 'Pesquisa efetuada com sucesso',
            'data'=> $usuario
        ];
    }

    public function searchByName($nome)
    {
        $usuarios = Usuario::where('nome', 'like', '%' . $nome . '%')->get();
        if($usuarios->isEmpty()){
            return [
                'status'=> false,
                'massage'=> 'Sem Resultados'
            ];
        }

        return [
            'status'=> true, 
            'massage'=> 'Resultados Encontrados',
            'data'=> $usuarios
        ];
    }

    public function searchByEmail($email)
    {
        $usuarios = Usuario::where('email', 'like', '%' . $email . '%')->get();
        if($usuarios->isEmpty()){
            return [
                'status'=> true,
                'massge'=> 'Resultado Encontrado'
            ];
        }
        
        return [
            'status'=> true, 
            'massage'=> 'Resultados Encontrados',
            'data'=> $usuarios
        ];
    }


}
