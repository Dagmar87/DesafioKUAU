import { Component, OnInit } from '@angular/core';
import { Aluno } from 'src/app/models/aluno.model';
import { AlunoService } from 'src/app/services/aluno.service';

@Component({
  selector: 'app-add-aluno',
  templateUrl: './add-aluno.component.html',
  styleUrls: ['./add-aluno.component.css'],
})
export class AddAlunoComponent implements OnInit {
  aluno: Aluno = {
    nome: '',
    email: '',
    dataDeNascimento: new Date(),
  };

  submitted = false;

  constructor(private alunoService: AlunoService) {}

  ngOnInit(): void {}

  saveAluno(): void {
    const data = {
      nome: this.aluno.nome,
      email: this.aluno.email,
      dataDeNascimento: this.aluno.dataDeNascimento,
    };
    this.alunoService.create(data).subscribe({
      next: (res) => {
        console.log(res);
        this.submitted = true;
      },
      error: (e) => console.error(e),
    });
  }

  newAluno(): void {
    this.submitted = false;
    this.aluno = {
      nome: '',
      email: '',
      dataDeNascimento: new Date(),
    };
  }
}
