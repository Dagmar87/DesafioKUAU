import { Turma } from 'src/app/models/turma.model';
import { Component, OnInit } from '@angular/core';
import { Aluno } from 'src/app/models/aluno.model';
import { AlunoService } from 'src/app/services/aluno.service';

@Component({
  selector: 'app-alunos-list',
  templateUrl: './alunos-list.component.html',
  styleUrls: ['./alunos-list.component.css'],
})
export class AlunosListComponent implements OnInit {
  alunos?: Aluno[];

  currentAluno: Aluno = {};

  turmas?: Turma[];

  currentTurma: Turma = {};

  currentIndex = -1;

  nome = '';

  constructor(private alunoService: AlunoService) {}

  ngOnInit(): void {
    this.retrieveAlunos();
  }

  retrieveAlunos(): void {
    this.alunoService.getAll().subscribe({
      next: (data) => {
        this.alunos = data;
        console.log(data);
      },
      error: (e) => console.error(e),
    });
  }

  refreshList(): void {
    this.retrieveAlunos();
    this.currentAluno = {};
    this.currentIndex = -1;
  }

  setActiveAluno(aluno: Aluno, index: number): void {
    this.currentAluno = aluno;
    this.currentIndex = index;
  }

  searchNome(): void {
    this.currentAluno = {};
    this.currentIndex = -1;
    this.alunoService.findByNome(this.nome).subscribe({
      next: (data) => {
        this.alunos = data;
        console.log(data);
      },
      error: (e) => console.error(e),
    });
  }
}
