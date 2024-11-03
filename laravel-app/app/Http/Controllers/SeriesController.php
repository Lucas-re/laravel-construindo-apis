<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Episode;
use App\Models\Season;
use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{   
    /**
     * Index: retorna pagina principal
     */
    public function index(Request $request)
    {
        /**
         * Usando Escopo local
         */
        // $aSeries = Serie::activeSeries()->get();

        /**
         * pega o parametro id passado pela url
         */
        // return $request->get('id');



        /**
         * pega a url
         */
        // return $request->url();



        /**
         * faz o redirecionamento da pagina colocando o status code
         */
        // return response('', 302, ['location' => 'https://www.google.com']);



        /**
         * faz o redirecionamento de forma simples
         */
        // return redirect('https://www.google.com');

        

        /**
         * Consulta dados utilizado a classe DB
         */
        // $aSeries = DB::select('SELECT nome FROM series; ');
        // dd($aSeries);



        /**
         * Consultas dados utilizando o Eloquent ORM
         */
        // $aSeries = Serie::all();
        // $aSeries = Serie::query()->where('nome', 'Arrow')->get();
        $aSeries = Serie::with(['seasons'])->get();



        /**
         * Recupera o dado mensagem de sucesso da sessão com get()
         */
        $mensagemSucesso = $request->session()->get('mensagem.sucesso');



        /**
         * Recupera o dado mensagem de sucesso da sessão com o helper session
         */
        //$mensagemSucesso = session('mensagem.sucesso');



        /**
         * remove a mensagem da sessão
         */
        $request->session()->forget('mensagem.sucesso');


        /**
         * temos essa forma de se retorna para uma view
         */
        
        // return view('listar-series', [
        //     'aSeries' => $aSeries
        // ]);



        /**
         * forma mais compacta
         */
        // return view('listar-series', compact('aSeries'));



        /**
         * com o metodo with 
         */
         return view('series.index')->with('aSeries', $aSeries)->with('mensagemSucesso', $mensagemSucesso);
        
    }


    /**
     * Create: retona pagina de cadastro
     */
    public function create()
    {
        $acao = 'Adicionar';
        return view('series.create')->with('acao', $acao);
    }


    /**
     * Store: Insere nova serie no banco
     */
    public function store(SeriesFormRequest $request) 
    {
        // dd($request->all());

        $serie = Serie::create($request->all());

        $aSeasons = [];
        for ($i = 1; $i <= $request->seasonQty; $i++){
            $aSeasons[] = [
                'series_id' => $serie->id,
                'number' => $i
            ];
        }
        Season::insert($aSeasons);

        $aEpisodes = [];
        foreach ($serie->seasons as $season){

            for($j = 1; $j <= $request->episodesPerSeason; $j++){
                $aEpisodes[] = [
                    'season_id' => $season->id,
                    'number' => $j
                ];
            }
        }
        Episode::insert($aEpisodes);


            
        
        /**
         * Valida campo nome diretamente com o Request
         * Esta comentando porque agora ele é validado pelo
         * SeriesFormRequest
         */
        // $request->validate([
        //     'nome' => ['required','min:3']
        // ]);

        ##### receber dados ########

        /**
         * Busca somente o campo especificado passado no parametro
         */
        //$request->only(['nome']);


        /**
         * Cria uma exceção. Busca todos os campos na requisição
         * exceto o que foi informado no parametro
         */
        //$request->except(['_token']);


        /**
         * pegar o valor acessando o indice do atributo
         */
        // $nomeSerie = $request->input('nome');


        /**
         * pegar o valor diretamente do atributo
         */
        // $nomeSerie = $request->nome;


        /**
         * Retorna todos os dados da requisição 
         * em um array associativo.
         */
        // $request->all();



        ###### Incluir ########

        /**
         * Pega todos os valores da requisição em um array associativo 
         * e insere utilizando o Mass Asingnment
         */
        // $serie = Serie::create($request->all());


        /**
         * Insere dados atraves da classe DB
         */
        // DB::insert('INSERT INTO series (nome) VALUES (?)', [$nomeSerie]);
        // return redirect('/series');


        /**
         * Insere dados atraves do Eloquent ORM 
         */
        // $serie = new Serie();
        // $serie->nome = $nomeSerie;
        // $serie->save();


        /**
         * Redirecionamento simples
         */
        //return redirect('/series');


        /**
         * Redirecionamento com metodo route
         * modelo 1
         */
        //return redirect()->route('series.index'); 


        /**
         * Redirecionamento com metodo route
         * modelo 2
         */
        //return redirect(route('series.index'));


        /**
         * Adiciona à sessão a mensagem de sucesso
         */
        //$request->session()->put('mensagem.sucesso',"Serie '{$serie->nome}' adicionada com sucesso");


        /**
         * Redirecionamento com metodo route
         * modelo 2
         * Criando variavel de sessão mensagem de sucesso
         */
        return to_route('series.index')->with('mensagem.sucesso',"Serie '{$serie->nome}' adicionada com sucesso");
           
    }

    
    /**
     * 
     */
    public function destroy(Request $request, Serie $series)
    {
        /**
         * Usar dessa forma se for passado o parametro do tipo Request
         */
        // $idSerie = $request->series;
        // $serie = Serie::find($serie);
        //Serie::destroy($idSerie);

        /**
         * Usa dessa forma se for passado a classe como tipo
         */
        $series->delete();



        /**
         * Adiciona na sessão a mensagem de sucesso com put
         */
        //$request->session()->put('mensagem.sucesso', "Serie '{$series->nome}' removida com sucesso");



        /**
         * Adiciona na sessão a mensagem de sucesso com flash
         */
        //$request->session()->flash('mensagem.sucesso', 'Serie removida com sucesso');


        /**
         * Adiciona na sessão a mensagem de sucesso com o helper do laravel session()
         */
        // session(['mensagem.sucesso' => 'Serie removida com sucesso']);



        /**
         * Redireciona e cria mensagem de sucesso na sessão
         */
        return to_route('series.index')->with('mensagem.sucesso', "Serie '{$series->nome}' removida com sucesso");

        
       
    }

    public function edit(Serie $series)
    {
        $acao = 'Editar';
       return view('series.edit')->with('serie', $series)->with('acao', $acao);
    }

    public function update(Serie $series, SeriesFormRequest $request)
    {
        $series->nome = $request->nome;
        $series->save();

        return to_route('series.index')->with('mensagem.sucesso', "Serie '{$series->nome}' atualizada com sucesso");
    }
}
