package br.net.fireup.geduca.model.pk;

import static com.mysema.query.types.PathMetadataFactory.*;

import com.mysema.query.types.path.*;

import com.mysema.query.types.PathMetadata;
import javax.annotation.Generated;
import com.mysema.query.types.Path;


/**
 * QMatriculaTurmaPK is a Querydsl query type for MatriculaTurmaPK
 */
@Generated("com.mysema.query.codegen.EmbeddableSerializer")
public class QMatriculaTurmaPK extends BeanPath<MatriculaTurmaPK> {

    private static final long serialVersionUID = 485486877L;

    public static final QMatriculaTurmaPK matriculaTurmaPK = new QMatriculaTurmaPK("matriculaTurmaPK");

    public final NumberPath<Long> codigoMatricula = createNumber("codigoMatricula", Long.class);

    public final NumberPath<Long> codigoTurma = createNumber("codigoTurma", Long.class);

    public QMatriculaTurmaPK(String variable) {
        super(MatriculaTurmaPK.class, forVariable(variable));
    }

    public QMatriculaTurmaPK(Path<? extends MatriculaTurmaPK> path) {
        super(path.getType(), path.getMetadata());
    }

    public QMatriculaTurmaPK(PathMetadata<?> metadata) {
        super(MatriculaTurmaPK.class, metadata);
    }

}

