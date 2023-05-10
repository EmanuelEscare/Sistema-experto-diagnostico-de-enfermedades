% Reglas
preguntar(Enfermedad) :-
    writeln('Piensa en una enfermedad y yo intentaré adivinarla.'),
    adivinar(Enfermedad).

adivinar(Enfermedad) :-
    enfermedad(Enfermedad),
    tiene_sintomas(Enfermedad, Sintomas),
    preguntas(Sintomas).

adivinar(_) :-
    writeln('Lo siento, no puedo diagnosticar la enfermedad').

tiene_sintomas(Enfermedad, Sintomas) :-
    findall(Sintoma, sintoma(Enfermedad, Sintoma), Sintomas).

preguntas([]) :-
    writeln('No se han proporcionado suficientes síntomas para realizar un diagnóstico.'), !.
preguntas([Sintoma1, Sintoma2, Sintoma3]) :-
    writeln('Se han proporcionado 3 síntomas. Realizando diagnóstico...'),
    inferir_enfermedad(Sintoma1, Sintoma2, Sintoma3, Enfermedad),
    writeln('El diagnóstico sugiere la enfermedad:'),
    writeln(Enfermedad).

preguntas([Sintoma|Resto]) :-
    writeln('¿El paciente presenta '| Sintoma |' ?'),
    writeln('? (si/no)'),
    read(Respuesta),
    (Respuesta == 'si' -> preguntas(Resto) ; fail).


inferir_enfermedad(Sintoma1, Sintoma2, Sintoma3, Enfermedad) :-
    enfermedad(Enfermedad),
    sintoma(Enfermedad, Sintoma1),
    sintoma(Enfermedad, Sintoma2),
    sintoma(Enfermedad, Sintoma3).