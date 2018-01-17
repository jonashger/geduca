package br.net.fireup.geduca.model;

import static com.mysema.query.types.PathMetadataFactory.*;

import com.mysema.query.types.path.*;

import com.mysema.query.types.PathMetadata;
import javax.annotation.Generated;
import com.mysema.query.types.Path;


/**
 * QMateria is a Querydsl query type for Materia
 */
@Generated("com.mysema.query.codegen.EntitySerializer")
public class QMateria extends EntityPathBase<Materia> {

    private static final long serialVersionUID = 623839341L;

    public static final QMateria materia = new QMateria("materia");

    public final StringPath codigoMateriaPadrao = createString("codigoMateriaPadrao");

    public final NumberPath<Long> codigoPessoa = createNumber("codigoPessoa", Long.class);

    public final NumberPath<Long> codigoTurma = createNumber("codigoTurma", Long.class);

    public final NumberPath<Long> id = createNumber("id", Long.class);

    public QMateria(String variable) {
        super(Materia.class, forVariable(variable));
    }

    public QMateria(Path<? extends Materia> path) {
        super(path.getType(), path.getMetadata());
    }

    public QMateria(PathMetadata<?> metadata) {
        super(Materia.class, metadata);
    }

}

