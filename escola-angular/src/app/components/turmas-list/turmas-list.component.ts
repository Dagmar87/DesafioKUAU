import { Component, OnInit } from '@angular/core';
import { Turma } from 'src/app/models/turma.model';
import { TurmaService } from 'src/app/services/turma.service';

@Component({
  selector: 'app-turmas-list',
  templateUrl: './turmas-list.component.html',
  styleUrls: ['./turmas-list.component.css'],
})
export class TurmasListComponent implements OnInit {
  turmas?: Turma[];

  currentTurma: Turma = {};

  currentIndex = -1;

  nome = '';

  constructor(private turmaService: TurmaService) {}

  ngOnInit(): void {}

  retrieveTurmas(): void {
    this.turmaService.getAll().subscribe({
      next: (data) => {
        this.turmas = data;
        console.log(data);
      },
      error: (e) => console.error(e),
    });
  }

  refreshList(): void {
    this.retrieveTurmas();
    this.currentTurma = {};
    this.currentIndex = -1;
  }

  setActiveTurma(turma: Turma, index: number): void {
    this.currentTurma = turma;
    this.currentIndex = index;
  }

  searchNome(): void {
    this.currentTurma = {};
    this.currentIndex = -1;
    this.turmaService.findByNome(this.nome).subscribe({
      next: (data) => {
        this.turmas = data;
        console.log(data);
      },
      error: (e) => console.error(e),
    });
  }
}
