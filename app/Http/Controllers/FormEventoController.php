<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FormEvento;

class FormEventoController extends Controller
{
    public function update(Request $request, $id){

        $validatedData = $request->validate([

            'etiquetanomeevento'        => ['nullable', 'string'],
            'etiquetatipoevento'        => ['nullable', 'string'],
            'etiquetadescricaoevento'   => ['nullable', 'string'],
            'etiquetadatas'             => ['nullable', 'string'],
            'etiquetasubmissoes'        => ['nullable', 'string'],
            'etiquetaenderecoevento'    => ['nullable', 'string'],
            'etiquetamoduloinscricao'   => ['nullable', 'string'],
            'etiquetamoduloprogramacao' => ['nullable', 'string'],
            'etiquetamoduloorganizacao' => ['nullable', 'string'],
            'etiquetabaixarregra'       => ['nullable', 'string'],
            'etiquetabaixartemplate'    => ['nullable', 'string'],
        ]);

        $formevento = FormEvento::where('eventoId',$id)->first();
        
        if(isset($request->etiquetanomeevento)){
            $formevento->etiquetanomeevento              = $request->etiquetanomeevento;
        }
        if(isset($request->etiquetatipoevento)){
            $formevento->etiquetatipoevento              = $request->etiquetatipoevento;
        }
        if(isset($request->etiquetadescricaoevento)){
            $formevento->etiquetadescricaoevento         = $request->etiquetadescricaoevento;
        }
        if(isset($request->etiquetadatas)){
            $formevento->etiquetadatas                   = $request->etiquetadatas;
        }
        if(isset($request->etiquetasubmissoes)){
            $formevento->etiquetasubmissoes              = $request->etiquetasubmissoes;
        }
        if(isset($request->etiquetaenderecoevento)){
            $formevento->etiquetaenderecoevento          = $request->etiquetaenderecoevento;
        }
        if(isset($request->etiquetamoduloinscricao)){
            $formevento->etiquetamoduloinscricao         = $request->etiquetamoduloinscricao;
        }
        if(isset($request->etiquetamoduloprogramacao)){
            $formevento->etiquetamoduloprogramacao       = $request->etiquetamoduloprogramacao;
        }
        if(isset($request->etiquetamoduloorganizacao)){
            $formevento->etiquetamoduloorganizacao       = $request->etiquetamoduloorganizacao;
        }
        if(isset($request->etiquetabaixarregra)){
            $formevento->etiquetabaixarregra             = $request->etiquetabaixarregra;
        }
        if(isset($request->etiquetabaixartemplate)){
            $formevento->etiquetabaixartemplate          = $request->etiquetabaixartemplate;
        }
        
        $formevento->save();

        return redirect()->route('coord.detalhesEvento', ['eventoId' => $id]);
    }

    public function exibirModulo(Request $request, $id) {
        
        $formevento = FormEvento::where('eventoId',$id)->first();
        
        if(isset($request->modinscricao)){
            $formevento->modinscricao       = $request->modinscricao;
        }
        if(isset($request->modprogramacao)){
            $formevento->modprogramacao       = $request->modprogramacao;
        }
        if(isset($request->modorganizacao)){
            $formevento->modorganizacao       = $request->modorganizacao;
        }
        if(isset($request->modsubmissao)){
            $formevento->modsubmissao       = $request->modsubmissao;
        }

        $formevento->save();

        return redirect()->route('coord.detalhesEvento', ['eventoId' => $id]);
    }
}
