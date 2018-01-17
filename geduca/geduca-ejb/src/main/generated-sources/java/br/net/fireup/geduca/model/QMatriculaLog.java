package br.net.fireup.geduca.model;

import static com.mysema.query.types.PathMetadataFactory.*;

import com.mysema.query.types.path.*;

import com.mysema.query.types.PathMetadata;
import javax.annotation.Generated;
import com.mysema.query.types.Path;
import com.mysema.query.types.path.PathInits;


/**
 * QMatriculaLog is a Querydsl query type for MatriculaLog
 */
@Generated("com.mysema.query.codegen.EntitySerializer")
public class QMatriculaLog extends EntityPathBase<MatriculaLog> {

    private static final long serialVersionUID = -329254562L;

    private static final PathInits INITS = PathInits.DIRECT2;

    public static final QMatriculaLog matriculaLog = new QMatriculaLog("matriculaLog");

    public final DatePath<java.util.Date> dataMatricula = createDate("dataMatricula", java.util.Date.class);

    public final br.net.fireup.geduca.model.pk.QMatriculaLogPK id;

    public QMatriculaLog(String variable) {
        this(MatriculaLog.class, forVariable(variable), INITS);
    }

    public QMatriculaLog(Path<? extends MatriculaLog> path) {
        this(path.getType(), path.getMetadata(), path.getMetadata().isRoot() ? INITS : PathInits.DEFAULT);
    }

    public QMatriculaLog(PathMetadata<?> metadata) {
        this(metadata, metadata.isRoot() ? INITS : PathInits.DEFAULT);
    }

    public QMatriculaLog(PathMetadata<?> metadata, PathInits inits) {
        this(MatriculaLog.class, metadata, inits);
    }

    public QMatriculaLog(Class<? extends MatriculaLog> type, PathMetadata<?> metadata, PathInits inits) {
        super(type, metadata, inits);
        this.id = inits.isInitialized("id") ? new br.net.fireup.geduca.model.pk.QMatriculaLogPK(forProperty("id")) : null;
    }

}

