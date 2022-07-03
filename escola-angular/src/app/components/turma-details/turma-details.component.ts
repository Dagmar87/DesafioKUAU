import { Component, Input, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { Turma } from 'src/app/models/turma.model';
import { TurmaService } from 'src/app/services/turma.service';

@Component({
  selector: 'app-turma-details',
  templateUrl: './turma-details.component.html',
  styleUrls: ['./turma-details.component.css'],
})
export class TurmaDetailsComponent implements OnInit {
  @Input() viewMode = false;

  @Input() currentTurma: Turma = {
    nome: '',
    serie: '',
  };

  message = '';

  constructor(
    private turmaService: TurmaService,
    private route: ActivatedRoute,
    private router: Router
  ) {}

  ngOnInit(): void {
    if (!this.viewMode) {
      this.message = '';
      this.getTurma(this.route.snapshot.params['id']);
    }
  }

  getTurma(id: string): void {
    this.turmaService.get(id).subscribe({
      next: (data) => {
        this.currentTurma = data;
        console.log(data);
      },
      error: (e) => console.error(e),
    });
  }

  updateTurma(): void {
    this.message = '';
    this.turmaService
      .update(this.currentTurma.id, this.currentTurma)
      .subscribe({
        next: (res) => {
          console.log(res);
          this.message = res.message
            ? res.message
            : 'A turma foi atualizada com sucesso!';
        },
        error: (e) => console.error(e),
      });
  }

  deleteTurma(): void {
    this.turmaService.delete(this.currentTurma.id).subscribe({
      next: (res) => {
        console.log(res);
        this.router.navigate(['/escola/turmas']);
      },
      error: (e) => console.error(e),
    });
  }
}
