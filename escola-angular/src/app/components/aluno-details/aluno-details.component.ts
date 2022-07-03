import { Component, Input, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { Aluno } from 'src/app/models/aluno.model';
import { Turma } from 'src/app/models/turma.model';
import { AlunoService } from 'src/app/services/aluno.service';

@Component({
  selector: 'app-aluno-details',
  templateUrl: './aluno-details.component.html',
  styleUrls: ['./aluno-details.component.css'],
})
export class AlunoDetailsComponent implements OnInit {
  @Input() viewMode = false;

  @Input() currentAluno: Aluno = {
    nome: '',
    email: '',
    dataDeNascimento: new Date(),
  };

  constructor(
    private alunoService: AlunoService,
    private route: ActivatedRoute,
    private router: Router
  ) {}

  message = '';

  turmas?: Turma[];

  currentTurma: Turma = {};

  ngOnInit(): void {}

  getAluno(id: string): void {
    this.alunoService.get(id).subscribe({
      next: (data) => {
        this.currentAluno = data;
        console.log(data);
      },
      error: (e) => console.error(e),
    });
  }

  updateAluno(): void {
    this.message = '';
    this.alunoService
      .update(this.currentAluno.id, this.currentAluno)
      .subscribe({
        next: (res) => {
          console.log(res);
          this.message = res.message
            ? res.message
            : 'O aluno foi atualizado com sucesso!';
        },
        error: (e) => console.error(e),
      });
  }

  deleteAluno(): void {
    this.alunoService.delete(this.currentAluno.id).subscribe({
      next: (res) => {
        console.log(res);
        this.router.navigate(['/escola/turmas']);
      },
      error: (e) => console.error(e),
    });
  }
}
