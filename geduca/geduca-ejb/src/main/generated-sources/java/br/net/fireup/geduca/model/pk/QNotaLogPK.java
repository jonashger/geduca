package br.net.fireup.geduca.model.pk;

import static com.mysema.query.types.PathMetadataFactory.*;

import com.mysema.query.types.path.*;

import com.mysema.query.types.PathMetadata;
import javax.annotation.Generated;
import com.mysema.query.types.Path;


/**
 * QNotaLogPK is a Querydsl query type for NotaLogPK
 */
@Generated("com.mysema.query.codegen.EmbeddableSerializer")
public class QNotaLogPK extends BeanPath<NotaLogPK> {

    private static final long serialVersionUID = -208149258L;

    public static final QNotaLogPK notaLogPK = new QNotaLogPK("notaLogPK");

    public final NumberPath<Long> codigoMatricula = createNumber("codigoMatricula", Long.class);

    public final NumberPath<Long> codigoTurma = createNumber("codigoTurma", Long.class);

    public QNotaLogPK(String variable) {
        super(NotaLogPK.class, forVariable(variable));
    }

    public QNotaLogPK(Path<? extends NotaLogPK> path) {
        super(path.getType(), path.getMetadata());
    }

    public QNotaLogPK(PathMetadata<?> metadata) {
        super(NotaLogPK.class, metadata);
    }

}

