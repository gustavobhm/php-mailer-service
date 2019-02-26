<?php

class MockData
{

    function getPubEmailSubsMock()
    {
        return json_decode(utf8_encode('[
                                        {
                                            "ID": "1",
                                            "TEMPLATE_ID": "1",
                                            "NUMERO": "1",
                                            "DESCRICAO": "Dr. José Maria",
                                            "MOD_DATA": "30-OCT-18"
                                        },
                                        {
                                            "ID": "2",
                                            "TEMPLATE_ID": "1",
                                            "NUMERO": "2",
                                            "DESCRICAO": "CRM: 66778899",
                                            "MOD_DATA": "30-OCT-18"
                                        },
                                        {
                                            "ID": "3",
                                            "TEMPLATE_ID": "2",
                                            "NUMERO": "1",
                                            "DESCRICAO": "FDG 4863",
                                            "MOD_DATA": "30-OCT-18"
                                        },
                                        {
                                            "ID": "4",
                                            "TEMPLATE_ID": "2",
                                            "NUMERO": "2",
                                            "DESCRICAO": "9876543",
                                            "MOD_DATA": "30-OCT-18"
                                        },                                        
                                        {
                                            "ID": "5",
                                            "TEMPLATE_ID": "2",
                                            "NUMERO": "3",
                                            "DESCRICAO": "01-JAN-19 à 31-DEZ-19",
                                            "MOD_DATA": "30-OCT-18"
                                        }
                                    ]'));
    }

    function getPubTemplatesMock()
    {
        return json_decode(utf8_encode('[
                                        {
                                            "ITEM": "0",
                                            "NOME_TEMPLATE": "ERROR",
                                            "ASSUNTO": "Relatório de e-mails não enviados.",
                                            "CONTEUDO": "",
                                            "FUNCAO": "",
                                            "MOD_DATA": "05-DEC-18"
                                        },
                                        {
                                            "ITEM": "1",
                                            "NOME_TEMPLATE": "CRM",
                                            "ASSUNTO": "Cremesp: Informações sobre o processo de inscrição do CRM.",
                                            "CONTEUDO": "",
                                            "FUNCAO": "PRC_INF_NUMCRM",
                                            "MOD_DATA": "30-OCT-18"
                                        },
                                        {
                                            "ITEM": "2",
                                            "NOME_TEMPLATE": "Rodízio Insenção",
                                            "ASSUNTO": "Cremesp: Informações sobre o processo de isenção do rodízio.",
                                            "CONTEUDO": "",
                                            "FUNCAO": "PRC_INF_NUMPLACA",
                                            "MOD_DATA": "30-OCT-18"
                                        },
                                        {
                                            "ITEM": "3",
                                            "NOME_TEMPLATE": "Rodizio Renovação",
                                            "ASSUNTO": "Cremesp: Renovação da isenção do rodízio municipal.",
                                            "CONTEUDO": "",
                                            "FUNCAO": "PRC_INF_NUMPLACA",
                                            "MOD_DATA": "03-DEC-18"
                                        }
                                    ]'));
    }

    function getPubEnvioEmailsMock()
    {
        return json_decode(utf8_encode('[
                                        {
                                            "ITEM": "1",
                                            "EMAIL": "gustavosantos@cremesp.org.br",
                                            "MOD_DATA": "10-DEC-18",
                                            "PUB_TEMPLATES_ITEM": "1",
                                            "NUM_TENTATIVAS": "2",
                                            "STATUS_ENVIO": "1",
                                            "OBS": "Email sent"
                                        },
                                        {
                                            "ITEM": "2",
                                            "EMAIL": "mayara_zanon@hotmail.com",
                                            "MOD_DATA": "10-DEC-18",
                                            "PUB_TEMPLATES_ITEM": "1",
                                            "NUM_TENTATIVAS": "2",
                                            "STATUS_ENVIO": "2",
                                            "OBS": "SMTP Error: Could not authenticate."
                                        },
                                        {
                                            "ITEM": "3",
                                            "EMAIL": "gustavosantos@cremesp.org.br",
                                            "MOD_DATA": "10-DEC-18",
                                            "PUB_TEMPLATES_ITEM": "1",
                                            "NUM_TENTATIVAS": "3",
                                            "STATUS_ENVIO": "1",
                                            "OBS": "Email sent"
                                        },
                                        {
                                            "ITEM": "4",
                                            "EMAIL": "natysa81@gmail.com",
                                            "MOD_DATA": "10-DEC-18",
                                            "PUB_TEMPLATES_ITEM": "1",
                                            "NUM_TENTATIVAS": "",
                                            "STATUS_ENVIO": "",
                                            "OBS": null
                                        },
                                        {
                                            "ITEM": "5",
                                            "EMAIL": "errado5.org.br",
                                            "MOD_DATA": "10-DEC-18",
                                            "PUB_TEMPLATES_ITEM": "1",
                                            "NUM_TENTATIVAS": "1",
                                            "STATUS_ENVIO": "",
                                            "OBS": null
                                        },
                                        {
                                            "ITEM": "6",
                                            "EMAIL": "errado6",
                                            "MOD_DATA": "10-DEC-18",
                                            "PUB_TEMPLATES_ITEM": "1",
                                            "NUM_TENTATIVAS": "",
                                            "STATUS_ENVIO": "",
                                            "OBS": null
                                        },
                                        {
                                            "ITEM": "7",
                                            "EMAIL": "mdalanezegomes@gmail.com",
                                            "MOD_DATA": "10-DEC-18",
                                            "PUB_TEMPLATES_ITEM": "2",
                                            "NUM_TENTATIVAS": "1",
                                            "STATUS_ENVIO": "",
                                            "OBS": null
                                        },
                                        {
                                            "ITEM": "8",
                                            "EMAIL": "gustavosantoscremesp.org.br",
                                            "MOD_DATA": "10-DEC-18",
                                            "PUB_TEMPLATES_ITEM": "2",
                                            "NUM_TENTATIVAS": "1",
                                            "STATUS_ENVIO": "",
                                            "OBS": null
                                        },
                                        {
                                            "ITEM": "9",
                                            "EMAIL": "égustavobhmbol.com.br",
                                            "MOD_DATA": "10-DEC-18",
                                            "PUB_TEMPLATES_ITEM": "2",
                                            "NUM_TENTATIVAS": "",
                                            "STATUS_ENVIO": "",
                                            "OBS": null
                                        },
                                        {
                                            "ITEM": "10",
                                            "EMAIL": "mpaletti@hotmail.com",
                                            "MOD_DATA": "10-DEC-18",
                                            "PUB_TEMPLATES_ITEM": "2",
                                            "NUM_TENTATIVAS": "",
                                            "STATUS_ENVIO": "",
                                            "OBS": null
                                        },
                                        {
                                            "ITEM": "11",
                                            "EMAIL": "gustavobhmbol.com.br",
                                            "MOD_DATA": "10-DEC-18",
                                            "PUB_TEMPLATES_ITEM": "2",
                                            "NUM_TENTATIVAS": "3",
                                            "STATUS_ENVIO": "2",
                                            "OBS": "Invalid address: gustavobhmbol.com.br"
                                        },
                                        {
                                            "ITEM": "12",
                                            "EMAIL": "gustavobhm@bol.com.br",
                                            "MOD_DATA": "10-DEC-18",
                                            "PUB_TEMPLATES_ITEM": "3",
                                            "NUM_TENTATIVAS": "",
                                            "STATUS_ENVIO": "",
                                            "OBS": ""
                                        },
                                        {
                                            "ITEM": "13",
                                            "EMAIL": "13@teste.com.br",
                                            "MOD_DATA": "01-DEC-18",
                                            "PUB_TEMPLATES_ITEM": "1",
                                            "NUM_TENTATIVAS": "1",
                                            "STATUS_ENVIO": "1",
                                            "OBS": "Email sent"
                                        },
                                        {
                                            "ITEM": "14",
                                            "EMAIL": "14@teste.com.br",
                                            "MOD_DATA": "01-DEC-18",
                                            "PUB_TEMPLATES_ITEM": "1",
                                            "NUM_TENTATIVAS": "1",
                                            "STATUS_ENVIO": "1",
                                            "OBS": "Email sent"
                                        },
                                        {
                                            "ITEM": "15",
                                            "EMAIL": "15@teste.com.br",
                                            "MOD_DATA": "01-DEC-18",
                                            "PUB_TEMPLATES_ITEM": "1",
                                            "NUM_TENTATIVAS": "1",
                                            "STATUS_ENVIO": "1",
                                            "OBS": "Email sent"
                                        },
                                        {
                                            "ITEM": "16",
                                            "EMAIL": "16@teste.com.br",
                                            "MOD_DATA": "02-DEC-18",
                                            "PUB_TEMPLATES_ITEM": "1",
                                            "NUM_TENTATIVAS": "1",
                                            "STATUS_ENVIO": "1",
                                            "OBS": "Email sent"
                                        },
                                        {
                                            "ITEM": "17",
                                            "EMAIL": "17@teste.com.br",
                                            "MOD_DATA": "02-DEC-18",
                                            "PUB_TEMPLATES_ITEM": "1",
                                            "NUM_TENTATIVAS": "1",
                                            "STATUS_ENVIO": "1",
                                            "OBS": "Email sent"
                                        },
                                        {
                                            "ITEM": "18",
                                            "EMAIL": "18@teste.com.br",
                                            "MOD_DATA": "03-DEC-18",
                                            "PUB_TEMPLATES_ITEM": "1",
                                            "NUM_TENTATIVAS": "1",
                                            "STATUS_ENVIO": "1",
                                            "OBS": "Email sent"
                                        },
                                        {
                                            "ITEM": "19",
                                            "EMAIL": "19@teste.com.br",
                                            "MOD_DATA": "04-DEC-18",
                                            "PUB_TEMPLATES_ITEM": "1",
                                            "NUM_TENTATIVAS": "1",
                                            "STATUS_ENVIO": "1",
                                            "OBS": "Email sent"
                                        },
                                        {
                                            "ITEM": "20",
                                            "EMAIL": "20@teste.com.br",
                                            "MOD_DATA": "05-DEC-18",
                                            "PUB_TEMPLATES_ITEM": "1",
                                            "NUM_TENTATIVAS": "1",
                                            "STATUS_ENVIO": "1",
                                            "OBS": "Email sent"
                                        },
                                        {
                                            "ITEM": "21",
                                            "EMAIL": "21@teste.com.br",
                                            "MOD_DATA": "06-DEC-18",
                                            "PUB_TEMPLATES_ITEM": "1",
                                            "NUM_TENTATIVAS": "1",
                                            "STATUS_ENVIO": "1",
                                            "OBS": "Email sent"
                                        },
                                        {
                                            "ITEM": "22",
                                            "EMAIL": "22@teste.com.br",
                                            "MOD_DATA": "07-DEC-18",
                                            "PUB_TEMPLATES_ITEM": "1",
                                            "NUM_TENTATIVAS": "1",
                                            "STATUS_ENVIO": "1",
                                            "OBS": "Email sent"
                                        },
                                        {
                                            "ITEM": "23",
                                            "EMAIL": "23@teste.com.br",
                                            "MOD_DATA": "08-DEC-18",
                                            "PUB_TEMPLATES_ITEM": "1",
                                            "NUM_TENTATIVAS": "1",
                                            "STATUS_ENVIO": "1",
                                            "OBS": "Email sent"
                                        },
                                        {
                                            "ITEM": "24",
                                            "EMAIL": "24@teste.com.br",
                                            "MOD_DATA": "09-DEC-18",
                                            "PUB_TEMPLATES_ITEM": "1",
                                            "NUM_TENTATIVAS": "1",
                                            "STATUS_ENVIO": "1",
                                            "OBS": "Email sent"
                                        },
                                        {
                                            "ITEM": "25",
                                            "EMAIL": "25@teste.com.br",
                                            "MOD_DATA": "10-DEC-18",
                                            "PUB_TEMPLATES_ITEM": "1",
                                            "NUM_TENTATIVAS": "1",
                                            "STATUS_ENVIO": "1",
                                            "OBS": "Email sent"
                                        },
                                        {
                                            "ITEM": "26",
                                            "EMAIL": "26@teste.com.br",
                                            "MOD_DATA": "11-DEC-18",
                                            "PUB_TEMPLATES_ITEM": "1",
                                            "NUM_TENTATIVAS": "1",
                                            "STATUS_ENVIO": "1",
                                            "OBS": "Email sent"
                                        },
                                        {
                                            "ITEM": "27",
                                            "EMAIL": "27@teste.com.br",
                                            "MOD_DATA": "12-DEC-18",
                                            "PUB_TEMPLATES_ITEM": "1",
                                            "NUM_TENTATIVAS": "1",
                                            "STATUS_ENVIO": "1",
                                            "OBS": "Email sent"
                                        },
                                        {
                                            "ITEM": "28",
                                            "EMAIL": "28@teste.com.br",
                                            "MOD_DATA": "13-DEC-18",
                                            "PUB_TEMPLATES_ITEM": "1",
                                            "NUM_TENTATIVAS": "1",
                                            "STATUS_ENVIO": "1",
                                            "OBS": "Email sent"
                                        },
                                        {
                                            "ITEM": "29",
                                            "EMAIL": "29@teste.com.br",
                                            "MOD_DATA": "14-DEC-18",
                                            "PUB_TEMPLATES_ITEM": "1",
                                            "NUM_TENTATIVAS": "1",
                                            "STATUS_ENVIO": "1",
                                            "OBS": "Email sent"
                                        },
                                        {
                                            "ITEM": "30",
                                            "EMAIL": "30@teste.com.br",
                                            "MOD_DATA": "15-DEC-18",
                                            "PUB_TEMPLATES_ITEM": "1",
                                            "NUM_TENTATIVAS": "1",
                                            "STATUS_ENVIO": "1",
                                            "OBS": "Email sent"
                                        },
                                        {
                                            "ITEM": "31",
                                            "EMAIL": "31@teste.com.br",
                                            "MOD_DATA": "15-DEC-18",
                                            "PUB_TEMPLATES_ITEM": "1",
                                            "NUM_TENTATIVAS": "1",
                                            "STATUS_ENVIO": "1",
                                            "OBS": "Email sent"
                                        },
                                        {
                                            "ITEM": "32",
                                            "EMAIL": "32@teste.com.br",
                                            "MOD_DATA": "15-DEC-18",
                                            "PUB_TEMPLATES_ITEM": "1",
                                            "NUM_TENTATIVAS": "1",
                                            "STATUS_ENVIO": "1",
                                            "OBS": "Email sent"
                                        },
                                        {
                                            "ITEM": "33",
                                            "EMAIL": "33@teste.com.br",
                                            "MOD_DATA": "15-DEC-18",
                                            "PUB_TEMPLATES_ITEM": "1",
                                            "NUM_TENTATIVAS": "1",
                                            "STATUS_ENVIO": "1",
                                            "OBS": "Email sent"
                                        },
                                        {
                                            "ITEM": "34",
                                            "EMAIL": "34@teste.com.br",
                                            "MOD_DATA": "15-DEC-18",
                                            "PUB_TEMPLATES_ITEM": "1",
                                            "NUM_TENTATIVAS": "1",
                                            "STATUS_ENVIO": "1",
                                            "OBS": "Email sent"
                                        },
                                        {
                                            "ITEM": "35",
                                            "EMAIL": "35@teste.com.br",
                                            "MOD_DATA": "15-DEC-18",
                                            "PUB_TEMPLATES_ITEM": "1",
                                            "NUM_TENTATIVAS": "1",
                                            "STATUS_ENVIO": "1",
                                            "OBS": "Email sent"
                                        },
                                        {
                                            "ITEM": "36",
                                            "EMAIL": "36teste.com.br",
                                            "MOD_DATA": "15-DEC-18",
                                            "PUB_TEMPLATES_ITEM": "1",
                                            "NUM_TENTATIVAS": "1",
                                            "STATUS_ENVIO": "2",
                                            "OBS": "Invalid address: 36@teste.com.br"
                                        },
                                        {
                                            "ITEM": "37",
                                            "EMAIL": "37teste.com.br",
                                            "MOD_DATA": "15-DEC-18",
                                            "PUB_TEMPLATES_ITEM": "1",
                                            "NUM_TENTATIVAS": "1",
                                            "STATUS_ENVIO": "2",
                                            "OBS": "Invalid address: 37@teste.com.br"
                                        },
                                        {
                                            "ITEM": "38",
                                            "EMAIL": "38@teste.com.br",
                                            "MOD_DATA": "14-DEC-18",
                                            "PUB_TEMPLATES_ITEM": "1",
                                            "NUM_TENTATIVAS": "1",
                                            "STATUS_ENVIO": "1",
                                            "OBS": "Email sent"
                                        },
                                        {
                                            "ITEM": "39",
                                            "EMAIL": "39teste.com.br",
                                            "MOD_DATA": "15-DEC-18",
                                            "PUB_TEMPLATES_ITEM": "1",
                                            "NUM_TENTATIVAS": "1",
                                            "STATUS_ENVIO": "2",
                                            "OBS": "Invalid address: 39@teste.com.br"
                                        },
                                        {
                                            "ITEM": "40",
                                            "EMAIL": "40teste.com.br",
                                            "MOD_DATA": "01-DEC-18",
                                            "PUB_TEMPLATES_ITEM": "1",
                                            "NUM_TENTATIVAS": "1",
                                            "STATUS_ENVIO": "2",
                                            "OBS": "Invalid address: 40@teste.com.br"
                                        }
                                    ]'));
    }
}

?>
