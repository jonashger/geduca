package br.net.fireup.geduca.model;

import static com.mysema.query.types.PathMetadataFactory.*;

import com.mysema.query.types.path.*;

import com.mysema.query.types.PathMetadata;
import javax.annotation.Generated;
import com.mysema.query.types.Path;
import com.mysema.query.types.path.PathInits;


/**
 * QMatriculaTurma is a Querydsl query type for MatriculaTurma
 */
@Generated("com.mysema.query.codegen.EntitySerializer")
public class QMatriculaTurma extends EntityPathBase<MatriculaTurma> {

    private static final long serialVersionUID = 1421526783L;

    private static final PathInits INITS = PathInits.DIRECT2;

    public static final QMatriculaTurma matriculaTurma = new QMatriculaTurma("matriculaTurma");

    public final br.net.fireup.geduca.model.pk.QMatriculaTurmaPK id;

    public QMatriculaTurma(String variable) {
        this(MatriculaTurma.class, forVariable(variable), INITS);
    }

    public QMatriculaTurma(Path<? extends MatriculaTurma> path) {
        this(path.getType(), path.getMetadata(), path.getMetadata().isRoot() ? INITS : PathInits.DEFAULT);
    }

    public QMatriculaTurma(PathMetadata<?> metadata) {
        this(metadata, metadata.isRoot() ? INITS : PathInits.DEFAULT);
    }

    public QMatriculaTurma(PathMetadata<?> metadata, PathInits inits) {
        this(MatriculaTurma.class, metadata, inits);
    }

    public QMatriculaTurma(Class<? extends MatriculaTurma> type, PathMetadata<?> metadata, PathInits inits) {
        super(type, metadata, inits);
        this.id = inits.isInitialized("id") ? new br.net.fireup.geduca.model.pk.QMatriculaTurmaPK(forProperty("id")) : null;
    }

}

