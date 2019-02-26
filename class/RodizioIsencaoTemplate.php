<?php

class RodizioIsencaoTemplate extends Template
{

    const EMAIL_TO = ROD_ISENCAO_TEMP_RESP_EMAIL;

    private $embeddedImages = array(
        array(
            'path' => 'img/ass_angelo_vattimo.jpg',
            'name' => 'signature'
        )
    );

    private $htmlBody = '<!DOCTYPE html>
                            <html lang="pt">
                                <head>
                                    <meta charset="UTF-8">
                                    <title>Cremesp</title>
                                </head>
                                <body>
                                    <div style="font-family:Arial, Helvetica, sans-serif; font-size: 16px;  text-align: justify;width: 750px; line-height: 1.5em;">

                                        <p style="padding: 0 1em; margin: 2em auto;" align="right">São Paulo, {param1} de {param2} de {param3}.</p>

                                        <p style="padding: 0 1em; margin: 2em auto;">{param4} {param5} {17} - CRM/SP: {1}</p>

                                        <p style="text-indent:2em; padding: 0 1em; margin: 2em auto;">
                                            Conforme divulgado no Diário Oficial da Cidade de São Paulo do dia {16}, página(s) ({15}), o pedido de isenção do rodízio municipal para o veículo de placa <strong>{3}</strong> foi aprovada pelo Departamento de Operação do Sistema Viário (DSV) para o período de <strong>{5}</strong> à <strong>{6}</strong>. 
                                        </p>

                                        <p style="text-indent:2em; padding: 0 1em; margin: 2em auto;">
                                            <strong>Solicitamos a conferência atenta da placa do veículo</strong>, visto que o bloqueio das multas depende desses dados cadastrados no Departamento de Operação do Sistema Viário (DSV). <strong>Em caso de divergência, o veículo não estará com o benefício ativo e poderá ser autuado pelo descumprimento ao rodízio veicular.</strong> 
                                        </p>

                                        <p style="text-indent:2em; padding: 0 1em; margin: 2em auto;">
                                            Para comunicar eventuais erros no cadastro da placa, entre em contato com a Seção de Cadastro pelo telefone (11) 3631-5275 ou pelo e-mail rod@cremesp.org.br. O Cremesp isenta-se de responsabilidades sobre eventuais multas geradas pelo cadastro incorreto da placa.
                                        </p>

                                        <p style="text-indent:2em; padding: 0 1em; margin: 2em auto;">
                                            Sem mais para o momento, colocamo-nos à disposição para esclarecimentos e renovamos nossos protestos de estima e consideração.
                                        </p>

                                        <p style="padding: 0 1em; margin: 2em 0 1em 0;" align="center">Atenciosamente,</p>

                                        <p style="padding:0; margin:0;" align="center">
                                            <img  src="cid:signature" alt="Signature">
                                        </p>

                                        <p style="padding: 0 1em; margin: 0 0 0 0;" align="center">Dr. Angelo Vattimo</p>

                                        <p style="padding: 0 1em; margin: 0 0 0 0;" align="center">Diretor Primeiro Secretário</p>

                                    </div>
                                </body>
                            </html>';

    function __construct()
    {
        parent::__construct(RODIZIO_ISENCAO_TEMPLATE_CODE);
    }

    function getHtmlBody($email)
    {
        $bodyParameters = json_decode(ProceduresDAO::executeProcedure($this->procedure, $email), true);

        if (isset($bodyParameters)) {
            $bodyParameters[5] = DateUtils::formatDateToPTBR($bodyParameters[5]);
            $bodyParameters[6] = DateUtils::formatDateToPTBR($bodyParameters[6]);
            $bodyParameters[16] = DateUtils::formatDateToPTBR($bodyParameters[16]);

            $gender = $bodyParameters[14];

            if ($gender == 'F') {
                $bodyParameters['param4'] = "Prezada";
                $bodyParameters['param5'] = "Dra";
            } else {
                $bodyParameters['param4'] = "Prezado";
                $bodyParameters['param5'] = "Dr";
            }
        }

        $bodyParameters['param1'] = date("d");
        $bodyParameters['param2'] = DateUtils::formatMonthToPTBR(date("Y-m-d"));
        $bodyParameters['param3'] = date("Y");

        return parent::setParametersInBodyContent($this->htmlBody, $bodyParameters);
    }

    function getEmbeddedImages()
    {
        return $this->embeddedImages;
    }

    function getEmailTo()
    {
        return $this::EMAIL_TO;
    }
}
?>