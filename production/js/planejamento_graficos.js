

function gerar_grafico_receitas(receitas, receitasAtuais){
  new Chart(document.getElementById("receitas"), {
    type: 'line',
    data: {
      labels: ["Janeiro", "Fevereiro", "Março", "Maio", "Junho", "Julho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
      datasets: [{ 
          data: [receitas[1], receitas[2], receitas[3], receitas[4], receitas[5], receitas[6], receitas[7], receitas[8], receitas[9], receitas[10], receitas[11], receitas[12]],
          label: "Receita Atual",
          borderColor: "#3e95cd",
          fill: false
        }, { 
          data: [receitasAtuais[1], receitasAtuais[2], receitasAtuais[3], receitasAtuais[4], receitasAtuais[5], receitasAtuais[6], receitasAtuais[7], receitasAtuais[8], receitasAtuais[9], receitasAtuais[10], receitasAtuais[11], receitasAtuais[12]],
          label: "Receita Planejada",
          borderColor: "#8e5ea2",
          fill: false
        }
      ]
    },
    options: {
      title: {
        display: true,
        text: 'Comparação entre Receitas'
      }
    }
  });
}

function gerar_grafico_despesas(receitas, receitasAtuais){
  new Chart(document.getElementById("despesas"), {
    type: 'line',
    data: {
      labels: ["Janeiro", "Fevereiro", "Março", "Maio", "Junho", "Julho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
      datasets: [{ 
          data: [receitas[1], receitas[2], receitas[3], receitas[4], receitas[5], receitas[6], receitas[7], receitas[8], receitas[9], receitas[10], receitas[11], receitas[12]],
          label: "Despesa Atual",
          borderColor: "#3e95cd",
          fill: false
        }, { 
          data: [receitasAtuais[1], receitasAtuais[2], receitasAtuais[3], receitasAtuais[4], receitasAtuais[5], receitasAtuais[6], receitasAtuais[7], receitasAtuais[8], receitasAtuais[9], receitasAtuais[10], receitasAtuais[11], receitasAtuais[12]],
          label: "Despesa Planejada",
          borderColor: "#8e5ea2",
          fill: false
        }
      ]
    },
    options: {
      title: {
        display: true,
        text: 'Comparação entre Receitas'
      }
    }
  });
}