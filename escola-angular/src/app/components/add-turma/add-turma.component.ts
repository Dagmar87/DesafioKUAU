import { Component, OnInit } from '@angular/core';
import { Turma } from 'src/app/models/turma.model';
import { TurmaService } from 'src/app/services/turma.service';

@Component({
  selector: 'app-add-turma',
  templateUrl: './add-turma.component.html',
  styleUrls: ['./add-turma.component.css'],
})
export class AddTurmaComponent implements OnInit {
  turma: Turma = {
    nome: '',
    serie: '',
  };

  submitted = false;

  constructor(private turmaService: TurmaService) {}

  ngOnInit(): void {}

  saveTurma(): void {
    const data = {
      nome: this.turma.nome,
      serie: this.turma.serie,
    };
    this.turmaService.create(data).subscribe({
      next: (res) => {
        console.log(res);
        this.submitted = true;
      },
      error: (e) => console.error(e),
    });
  }

  newTurma(): void {
    this.submitted = false;
    this.turma = {
      nome: '',
      serie: '',
    };
  }
}
