package br.net.fireup.geduca.model.pk;

import static com.mysema.query.types.PathMetadataFactory.*;

import com.mysema.query.types.path.*;

import com.mysema.query.types.PathMetadata;
import javax.annotation.Generated;
import com.mysema.query.types.Path;


/**
 * QMatriculaLogPK is a Querydsl query type for MatriculaLogPK
 */
@Generated("com.mysema.query.codegen.EmbeddableSerializer")
public class QMatriculaLogPK extends BeanPath<MatriculaLogPK> {

    private static final long serialVersionUID = -1204837252L;

    public static final QMatriculaLogPK matriculaLogPK = new QMatriculaLogPK("matriculaLogPK");

    public final NumberPath<Long> codigoEmpresa = createNumber("codigoEmpresa", Long.class);

    public final NumberPath<Long> codigoMatricula = createNumber("codigoMatricula", Long.class);

    public final DatePath<java.util.Date> dataLog = createDate("dataLog", java.util.Date.class);

    public QMatriculaLogPK(String variable) {
        super(MatriculaLogPK.class, forVariable(variable));
    }

    public QMatriculaLogPK(Path<? extends MatriculaLogPK> path) {
        super(path.getType(), path.getMetadata());
    }

    public QMatriculaLogPK(PathMetadata<?> metadata) {
        super(MatriculaLogPK.class, metadata);
    }

}

